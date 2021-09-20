<?php

namespace SocialiteProviders\Uacf;

use SocialiteProviders\Manager\SocialiteWasCalled;

class UacfExtendSocialite
{
    /**
     * Register the provider.
     *
     * @param  \SocialiteProviders\Manager\SocialiteWasCalled $socialiteWasCalled
     */
    public function handle(SocialiteWasCalled $socialiteWasCalled)
    {
        $socialiteWasCalled->extendSocialite('uacf', Provider::class);
    }
}
