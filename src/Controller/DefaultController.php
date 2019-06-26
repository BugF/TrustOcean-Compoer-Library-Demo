<?php

namespace App\Controller;

use Londry\TrustOceanSSL\api\SslOrder;
use Londry\TrustOceanSSL\definition\CertificatePeriod;
use Londry\TrustOceanSSL\definition\CertificateType;
use Londry\TrustOceanSSL\model\Csr;
use Londry\TrustOceanSSL\model\Product;
use Londry\TrustOceanSSL\TrustoceanException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{

    /**
     * @Route("/", name="default")
     */
    public function index(Request $request, Session $session)
    {

        if($request->get('action') === 'apply'){
            try{

                if($session->get('browserWindowHash') !== $request->get('browserWindowHash')){
                    throw new TrustoceanException('申请数据中的 Hash 校验失败, 请不要反复刷新您的窗口或使用旧的窗口进行申请. 您可以尝试新开窗口重试。');
                };

                if(time() - strtotime($session->get('timeToAplly')) < 60*5){
                    throw new TrustoceanException('每5分钟仅可提交1个新订单, 请您稍后再试');
                }

                // todo:: you need configurate this API credentials to continue access TrustOcean Reseller API
                $sslOrder = new SslOrder('yournicename@example.com','APITOKEN-you-can-replace-this-to-your-own-api-token');

                $sslOrder->setCertificateType(CertificateType::TrustOceanEncryption365Ssl);
                $sslOrder->setCertificatePeriod(CertificatePeriod::ThreeMonths);
                $sslOrder->setUniqueId('oc5548cn'.time().rand(0,9));
                $sslOrder->setDomains(explode("\r\n", $request->get('domains')));
                $sslOrder->setCsrCode(new Csr($request->get('csr_code')));

                $dcvMehods = [];
                foreach ($sslOrder->getDomains() as $domainName){
                    $dcvMehods[] = 'dns';
                }
                $sslOrder->setDcvMethod($dcvMehods);

                $sslOrder->setContactEmail($request->get('contact_email'));

                $newOrder = $sslOrder->callInit(NULL)->callCreate();

                $session->set('timeToAply', date('Y-m-d H:i:s', time()));

                return $this->render('default/index.html.twig', [
                    'dcv_info' => $newOrder->getDcvInfo(),
                    'order_id'  => $newOrder->getOrderId(),
                    'contact_email' =>  $newOrder->getContactEmail()
                ]);
            }catch (TrustoceanException $e){
                $simpleHash = md5(time().rand(00000,99999));
                $session->set('browserWindowHash', $simpleHash);
                return $this->render('default/index.html.twig', [
                    'error' => $e->getMessage(),
                    'browserWindowHash' => $simpleHash
                ]);
            }
        }
        $simpleHash = md5(time().rand(00000,99999));
        $session->set('browserWindowHash', $simpleHash);
        return $this->render('default/index.html.twig', [
            'browserWindowHash' => $simpleHash
        ]);
    }
}
