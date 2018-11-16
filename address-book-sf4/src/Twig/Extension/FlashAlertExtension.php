<?php

namespace App\Twig\Extension;

// Principe SOLID
// S: Single Responsability :
// Les classes doit avoir une responsabilité unique
// O: Open/Close :
// Les classes doivent être ouverte à
// l'extension mais fermée à la modification
// D: Dependency Inversion Principe
// Il vaut mieux dépendre des abstractions que des implémentations
use Symfony\Component\HttpFoundation\Session\Flash\FlashBagInterface;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class FlashAlertExtension extends AbstractExtension
{
    /** @var FlashBagInterface */
    protected $flashBag;

    /**
     * FlashAlertExtension constructor.
     * @param FlashBagInterface $flashBag
     */
    public function __construct(FlashBagInterface $flashBag)
    {
        $this->flashBag = $flashBag;
    }


    public function getFunctions()
    {
        return [
          new TwigFunction('flashAlert', [$this, 'flashAlert'], ['is_safe' => ['html']]),
        ];
    }

    public function flashAlert($type = 'success')
    {
        $html = '';

        foreach ($this->flashBag->get($type) as $message) {
            // PHP Heredoc
            $html .= <<<HTML
<div class="alert alert-$type">$message</div>
HTML;
        }

        return $html;
    }

}