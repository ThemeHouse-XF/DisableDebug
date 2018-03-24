<?php
class ThemeHouse_DisableDebug_Listener_InitDependencies extends ThemeHouse_Listener_InitDependencies
{
    public static function initDependencies(XenForo_Dependencies_Abstract $dependencies, array $data)
    {
        $xenOptions = XenForo_Application::get('options');
        if ($xenOptions->mctrades_enableDebugMode_selection) {
            XenForo_Application::setDebugMode(true);
        }
        if ($xenOptions->waindigo_disableDebugMode_section != 'none') {
            if ($dependencies instanceof XenForo_Dependencies_Public && $xenOptions->th_disableDebugMode_section != 'admin') {
                XenForo_Application::setDebugMode(false);
            } elseif ($dependencies instanceof XenForo_Dependencies_Admin && $xenOptions->th_disableDebugMode_section  != 'public') {
                XenForo_Application::setDebugMode(false);
            }
        }
        if ($xenOptions->mctrades_enableDebugMode_iprestrict_selection) {
                if (!in_array($_SERVER['REMOTE_ADDR'], explode(",", $xenOptions->mctrades_enableDebugMode_iprestrict_addresses))) {
                        XenForo_Application::setDebugMode(false);
                }
        }
        $initDependencies = new ThemeHouse_DisableDebug_Listener_InitDependencies($dependencies, $data);
        $initDependencies->run();
    } /* END initDependencies */
}

