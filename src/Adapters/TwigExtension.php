<?php
namespace Wowe\Recaptcha\Adapters;

use Twig\Extension\AbstractExtension;
use Twig\Extension\ExtensionInterface;
use Twig\TwigFunction;
use \Wowe\Recaptcha\Recaptcha;

class TwigExtension extends AbstractExtension implements ExtensionInterface
{
    private $recaptcha;

    /**
     * Create a new instance of TwigExtension with the recaptcha engine.
     *
     * @param \Wowe\Recaptcha\Recaptcha $recaptcha An instance of the Recaptcha class.
     */
    public function __construct(Recaptcha $recaptcha)
    {
        $this->recaptcha = $recaptcha;
    }

    public function getFunctions()
    {
        return [
            new TwigFunction('recaptchaScript', [$this->recaptcha, 'script']),
            new TwigFunction('recaptchaWidget', [$this->recaptcha, 'widget'])
        ];
    }
}
