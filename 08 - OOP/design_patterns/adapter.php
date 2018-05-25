<?php
/**
    ADAPTER:
 *
 * Permet d'adapter deux objets pour qu'ils fonctionnent ensemble.
 * L’adaptateur fait fonctionner ensemble des classes qui n’auraient pas pu fonctionner sans lui.
 *
 * Utile qd on utilise des API externes sur lesquelles on a pas la main ou par souci de compatibilité avec de l'ancien code
 *
 * Ex: système de paiement en ligne:
 *
 * si la méthode de paiement change (ex: sendPayment => payPayment) et que l'on l'utilise directement dans le code, il faudra la modifier partout
 */


class PayPal {
    public function __construct()
    {
    }

    public function sendPayment($amount)
    {
        echo "Payer par Paypal: " . $amount;
    }
}

class Ogone {
    public function __construct()
    {
    }

    public function doPayment($amount)
    {
        echo "Payer par Ogone: " . $amount;
    }
}

interface PaymentAdapter {
    // méthode générique que l'on utilisera via les adapter, sans se souci des méthodes spécifiques propres à chaque classe de paiement
    public function pay($amount);
}

class PayPalAdapter implements PaymentAdapter {
    private $payPal;

    public function __construct(PayPal $payPal)
    {
        $this->payPal = $payPal;
    }

    public function pay($amount)
    {
        $this->payPal->sendPayment($amount);
    }
}

class OgoneAdapter implements PaymentAdapter {
    /**
     * @var Ogone
     */
    private $ogone;

    public function __construct(Ogone $ogone)
    {
        $this->ogone = $ogone;
    }

    public function pay($amount)
    {
        $this->ogone->doPayment($amount);
    }
}
