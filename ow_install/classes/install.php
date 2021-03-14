<?php

class INSTALL
{
    /**
     * 
     * @return INSTALL_Storage
     */
    public static function getStorage() {
        return INSTALL_Storage::getInstance();    
    }
    
    /**
     * 
     * @return INSTALL_CMP_Steps
     */
    public static function getStepIndicator() {
        static $stepIndicator;
        
        if(empty($stepIndicator)) {
            $stepIndicator = new INSTALL_CMP_Steps(self::getPredefinedPluginList(true));
        }

        return $stepIndicator;    
    }

    /**
     * 
     * @return INSTALL_ViewRenderer
     */
    public static function getViewRenderer() {
        return INSTALL_ViewRenderer::getInstance();
    }
    
    /**
     * 
     * @return INSTALL_CMP_Langs
     */
    public static function getLangs() {
        return new INSTALL_CMP_Langs();
    }

    /**
     * Get predefined plugin list
     *
     * @param boolean $onlyOptional
     * @return array
     */
    public static function getPredefinedPluginList() {
        $pluginList = array(
            'newsfeed' => 'auto',
            'mailbox' => 'auto',
            'notifications' => 'auto',
            'slideshow' => 'manual',
            'photo' => 'auto',
            'video' => 'manual',
            'friends' => 'auto',
        );

        return $pluginList;
    }
    
    /**
     * Get mysql tables list
     *
     * @return array
     */
    public static function getTableDBList() {
        $tables = array(
            'base_attachment',
            'base_authorization_action',
            'base_authorization_group',
            'base_authorization_moderator',
            'base_authorization_moderator_permission',
            'base_authorization_permission',
            'base_authorization_role',
            'base_authorization_user_role',
            'base_avatar',
            'base_billing_gateway',
            'base_billing_gateway_config',
            'base_billing_gateway_product',
            'base_billing_product',
            'base_billing_sale',
            'base_cache',
            'base_cache_tag',
            'base_comment',
            'base_comment_entity',
            'base_component',
            'base_component_entity_place',
            'base_component_entity_position',
            'base_component_entity_setting',
            'base_component_place',
            'base_component_place_cache',
            'base_component_position',
            'base_component_setting',
            'base_config',
            'base_cron_job',
            'base_document',
            'base_email_verify',
            'base_entity_tag',
            'base_file',
            'base_flag',
            'base_geolocation_country',
            'base_geolocation_ip_to_country',
            'base_geolocationdata_ipv4',
            'base_invitation',
            'base_invite_code',
            'base_language',
            'base_language_key',
            'base_language_prefix',
            'base_language_value',
            'base_log',
            'base_login_cookie',
            'base_mail',
            'base_mass_mailing_ignore_user',
            'base_media_panel_file',
            'base_menu_item',
            'base_place',
            'base_place_entity_scheme',
            'base_place_scheme',
            'base_plugin',
            'base_preference',
            'base_preference_data',
            'base_preference_section',
            'base_question',
            'base_question_account_type',
            'base_question_config',
            'base_question_data',
            'base_question_section',
            'base_question_to_account_type',
            'base_question_value',
            'base_rate',
            'base_remote_auth',
            'base_restricted_usernames',
            'base_scheme',
            'base_search',
            'base_search_entity',
            'base_search_entity_tag',
            'base_search_result',
            'base_site_statistic',
            'base_sitemap',
            'base_tag',
            'base_theme',
            'base_theme_content',
            'base_theme_control',
            'base_theme_control_value',
            'base_theme_image',
            'base_theme_master_page',
            'base_user',
            'base_user_auth_token',
            'base_user_block',
            'base_user_disapprove',
            'base_user_featured',
            'base_user_online',
            'base_user_reset_password',
            'base_user_status',
            'base_user_suspend',
            'base_vote',
            'file_temporary',
        );
        
        return $tables;
    }
}
