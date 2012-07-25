Yii SCM Issues Module
===========================

What is it?
-----------

This module allows you to set up a page in a restricted area of your web site.
On this page users can communicate with you through issues, which are hosted on a GitHub/Bitbucket/(implement your own SCM provider wrapper) repo, associated with your website.
It's a more convenient way to handle all feedback in on place.

What it's not?
--------------

It's not a feedback form.
It's not a complete replace for a GitHub/Bitbucket web UI.

Setup
-----

* Extract modules' contents into /protected/modules directory
* In config.php add

        'modules' => array(
            // ... some code here ...
            'issues' => array(
                'provider' => 'github', // see models/ScmProvider.php file for custom providers
                'username' => 'your_scm_username',
                'password' => 'your_scm_password',
                'repoSlug' => 'your_scm_repo_slug', //basically a part of your repo's URL which represents repo's name in a URL-friendly format
            ),
            // ... some code here ...
        ),

* Proceed to http://your-yii-app/issues