<?php
class PluginShareCopy{
  function __construct() {
    wfPlugin::enable('copy/clipboard');
  }
  public function widget_button_copy_page($data){
    $data = new PluginWfArray($data);
    if(!$data->get('data/u')){
      if(wfRequest::get('u')){
        $data->set('data/u', wfRequest::get('u'));
      }else{
        $data->set('data/u', wfServer::calcUrl(true));
      }
    }
    $data->set('data/id', 'id'.wfCrypt::getUid());
    $element = wfDocument::getElementFromFolder(__DIR__, __FUNCTION__);
    $element->setByTag($data->get('data'));
    wfDocument::renderElement($element);
  }
}