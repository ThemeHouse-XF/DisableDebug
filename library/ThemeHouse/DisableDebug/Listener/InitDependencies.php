<?php

class ThemeHouse_DisableDebug_Listener_InitDependencies extends ThemeHouse_Listener_InitDependencies
{

    public static function initDependencies(XenForo_Dependencies_Abstract $dependencies, array $data)
    {
        $xenOptions = XenForo_Application::get('options');
        if ($dependencies instanceof XenForo_Dependencies_Public && $xenOptions->th_disableDebugMode_section != 'admin') {
            XenForo_Application::setDebugMode(false);
        } elseif ($dependencies instanceof XenForo_Dependencies_Admin && $xenOptions->th_disableDebugMode_section != 'public') {
            XenForo_Application::setDebugMode(false);
        }

        $initDependencies = new ThemeHouse_DisableDebug_Listener_InitDependencies($dependencies, $data);
        $initDependencies->run();
    } /* END initDependencies */
}