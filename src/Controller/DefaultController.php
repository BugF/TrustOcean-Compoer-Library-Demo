<?php

namespace App\Controller;

use Londry\TrustOceanSSL\api\SslOrder;
use Londry\TrustOceanSSL\definition\CertificatePeriod;
use Londry\TrustOceanSSL\definition\CertificateType;
use Londry\TrustOceanSSL\model\Csr;
use Londry\TrustOceanSSL\model\Product;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{

    /**
     * @Route("/", name="default")
     */
    public function index()
    {

//        $sslOrder = new SslOrder('','');
//        $sslOrder->setCertificateType(CertificateType::TrustOceanEncryption365Ssl);
//        $sslOrder->setCertificatePeriod(CertificatePeriod::ThreeMonths);
//        $sslOrder->setUniqueId('oc5548cn'.time().rand(0,9));
//        $sslOrder->setDomains([
//            'test1.trustocean.com','test2.trustocean.com','test3.trustocean.com'
//        ]);
//        $sslOrder->setCsrCode(new Csr('-----BEGIN CERTIFICATE REQUEST-----
//MIIC3jCCAcYCAQAwgZgxCzAJBgNVBAYTAkNOMRIwEAYDVQQIDAlHdWFuZ2Rvbmcx
//ETAPBgNVBAcMCFNoZW56aGVuMQ0wCwYDVQQKDARhc2RmMQ0wCwYDVQQLDARhc2Rm
//MR0wGwYDVQQDDBR0ZXN0My50cnVzdG9jZWFuLmNvbTElMCMGCSqGSIb3DQEJARYW
//dGFuZ2xvbmdqdW5AcWlhb2tyLmNvbTCCASIwDQYJKoZIhvcNAQEBBQADggEPADCC
//AQoCggEBANE+WUnvpJHztIxgFnPvt+rMPZA2Cd9JDYjq8LOi1acTTgb2DLBRZAdV
//QxsvCTy/L1Z4fEDhHXK/6jrKYxleDUPBolG9Wtjdw8vjXB/ng5tBzdrF/laTlinD
//GKRBCPIzLgahY9Twyxag1vneVYj/53UFLnyyLya3oAl/aEmQzILKpa0yxfJ5Cubx
//ybxQb9hZT+bolIH+ddCXqk8EZ5xkWmnnUTC8jpx6luQBsNzAU5aTH7dEVGvsSj1D
//vHiyBh7M/MeZTEjZLIN1M1E1qRJz872H7coeu6OheJHDjPI0irhTSxK/jS4r/iU7
//jubwQQelSHs/BlNtSOSG6yKo43qiyw8CAwEAAaAAMA0GCSqGSIb3DQEBBQUAA4IB
//AQBCeg4zCZF0sKRWhXWliMP7mB/EnLKlsPoQQayKTjIkOoyrWE9cU2TVZhEdEjqo
//syEedftaJdYfzXbQTNZcdR6f7lb+Joe1XQfOYa6qvjr0g1gj28ELdSfxCAH9mVdi
//JpmqGzjZhSIRdFwY5NAYoqzHiD39cxY8zOl0vGH5CN27MiUKSEsrqToY/lb3pni3
//D6aA0TCfLDmy0jNOMC0iR6VXFOMbGE4eOWfcnnsf9y3B0cvPTqUdI+YizhxOFOaK
//Tu3c2VuyFtLNsNOuZpj4+0mqoQV1hJTTAMxmCmG6m7KD02JHrc53wWNIb/DREd0D
//FCsNM8QnJDsZAd1CZZwSFc8q
//-----END CERTIFICATE REQUEST-----'));
//        $sslOrder->setDcvMethod([
//           'dns','dns','dns'
//        ]);
//        $sslOrder->setContactEmail('tanglongjun@qiaokr.com');
//
//        $newOrder = $sslOrder->callInit(NULL)->callCreate();
//
//        var_dump($newOrder->getOrderId());

        return $this->render('default/index.html.twig', [
            'controller_name' => 'DefaultController',
        ]);
    }
}
