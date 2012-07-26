<?php

class TrackerController extends Controller
{
    public $layout = 'main';
    private $_provider;

    public function beforeAction($action)
    {
        parent::beforeAction($action);

        $this->_provider = ucfirst($this->module->provider).'ScmProvider';

        return true;
    }

    public function actionIndex()
    {
        // TODO: cleanup
        $provider = new $this->_provider();

        $issuesList = $provider->getIssuesList();

        if($issuesList->count !=0)
        {
            $dataProvider = new CArrayDataProvider($issuesList->issues,
                array(
                    'keyField'=>'local_id',
                )
            );
        }
        $this->render('index', compact('dataProvider'));
    }
}