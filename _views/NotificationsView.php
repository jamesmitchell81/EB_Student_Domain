<?php

class NotificationsView implements View
{
  private $model;
  private $data;

  public function __construct($model)
  {
    $this->model = $model;
  }

  public function getData()
  {
    $this->data['action'] = "View";
    $this->data['entity'] = "Notifications";
    $this->data['title'] = "Notifications";
    $this->data['notifications'] = $this->model->getNotifications();

    $this->data['scripts'] = [];
  }

  public function display()
  {
    ob_start();
    include "_templates/head.php";
    include "_templates/header-nav.php";
    include "_templates/content-header.php";
    include "_templates/notifications.php";
    include "_templates/content-end.php";
    include "_templates/footer.php";
    include "_templates/page-end.php";
    ob_end_flush();
  }
}