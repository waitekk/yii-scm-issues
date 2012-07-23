Yii Bitbucket Issues Module
===========================

What is it?
-----------

This module allows  This module allows you to set up a page in a restricted area of your web site. On this page users can communicate with you through issues, which are hosted on a Bitbucket repo, associated with your website. I think it's more convinient to handle all feedback in on place.

Setup
-----

* Extract modules' contents into /protected/modules directory
* In config.php add

`
'modules' => array(
    // .. some code here ..
    'issues' => array(
        'username' => 'your_bitbucket_username',
        'password' => 'your_bitbucket_password',
        'repoSlug' => 'your_bitbucket_repo_slug' // see https://confluence.atlassian.com/display/BITBUCKET/What+is+a+Slug
        'hideIssues' => array(
            // types of issues you want to hide
            'resolved', 'wontfix', 'duplicate', 'invalid'
        )
    )
)
`
* Proceed to http://your-yii-app/issues