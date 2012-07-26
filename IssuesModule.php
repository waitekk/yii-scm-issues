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

class IssuesModule extends CWebModule
{
    public $defaultController = 'tracker';

    /**
     * SCM provider
     */
    public $provider;

    /**
     * Your SCM provider username
     */
    public $username;

    /**
     * Your SCM provider Password
     */
    public $password;

    /**
     * Your repo slug (see https://confluence.atlassian.com/display/BITBUCKET/What+is+a+Slug)
     */
    public $repoSlug;

    /**
     * Hide issues with this type set
     * TODO: deal with this, either leave or implement support of
     */
    /*public $hideIssues = array('resolved', 'wontfix', 'duplicate', 'invalid');*/

    /**
     * Allowed Git SCM providers
     * If you want to use a provider other than the bundled one,
     * see models/ScmProvider.php for implementation details.
     */
    protected $providers = array('github', 'bitbucket');

    public function init()
	{
		// this method is called when the module is being created
		// you may place code here to customize the module or the application

		// import the module-level models and components
		$this->setImport(array(
			'issues.models.*',
			'issues.components.*',
            'issues.extensions',
            'issues.extensions.timeago.*',
		));

        // check if there's a proper provider set
        if(!in_array($this->provider, $this->providers, true))
        {
            throw new CException(Yii::t('issues', 'Wrong SCM provider set, please check your config file.'));
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
