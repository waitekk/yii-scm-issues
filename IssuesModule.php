<?php
/**
 * This module allows you to set up a page in a restricted
 * area of your web site. On this page users can communicate with you
 * through issues, which are hosted on a Bitbucket repo,
 * associated with your website.
 *
 * @author Max Zaets <waitekk.work@gmail.com>
 * @copyright Copyright &copy; Max Zaets 2012-
 * @license http://opensource.org/licenses/MIT MIT License
 */

Yii::import('application.modules.issues.extensions.curl.Curl');
class IssuesModule extends CWebModule
{
    public $defaultController = 'tracker';

    /**
     * Your Bitbucket username
     */
    public $username;

    /**
     * Your Bitbucket Password
     */
    public $password;

    /**
     * Your Bitbucket repo slug (see https://confluence.atlassian.com/display/BITBUCKET/What+is+a+Slug)
     */
    public $repoSlug;

    /**
     * Hide issues with this type set
     */
    public $hideIssues = array('resolved', 'wontfix', 'duplicate', 'invalid');

    /**
     * Allowed Git SCM providers
     */
    protected $providers = array('github', 'bitbucket');

    /**
     * Git SCM provider
     */
    public $provider;

    public function init()
	{
		// this method is called when the module is being created
		// you may place code here to customize the module or the application

		// import the module-level models and components
		$this->setImport(array(
			'issues.models.*',
			'issues.components.*',
            'issues.extensions'
		));

        // check if there's a proper provider set
        if(!in_array($this->provider, $this->providers, true))
        {
            throw new CException(Yii::t('issues', 'Wrong Git SCM provider set, please check your config file.'));
        }
	}

	public function beforeControllerAction($controller, $action)
	{
		if(parent::beforeControllerAction($controller, $action))
		{
			// this method is called before any module controller action is performed
			// you may place customized code here
			return true;
		}
		else
			return false;
	}
}
