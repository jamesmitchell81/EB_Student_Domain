<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="<?= BASE_PATH; ?>css/reset.css" media='screen'>
  <link rel="stylesheet" href="<?= BASE_PATH; ?>css/base.css" media='screen'>
  <link rel="stylesheet" href="<?= BASE_PATH; ?>css/attendance.css" media='screen'>
  <link rel="stylesheet" href="<?= BASE_PATH; ?>css/tables.css" media='screen'>
  <link rel="stylesheet" href="<?= BASE_PATH; ?>css/assignments.css" media='screen'>
  <link rel="stylesheet" href="<?= BASE_PATH; ?>css/signin.css" media='screen'>
  <link rel="stylesheet" href="<?= BASE_PATH; ?>css/timetable.css" media='screen'>
  <link rel="stylesheet" href="<?= BASE_PATH; ?>css/diary.css" media='screen'>
  <link rel="stylesheet" href="<?= BASE_PATH; ?>css/notification.css" media='screen'>
  <link rel="stylesheet" href="<?= BASE_PATH; ?>css/forms.css" media='screen'>
  <link rel="stylesheet" href="<?= BASE_PATH; ?>css/media_queries.css" media='screen'>
  <link rel="stylesheet" href="<?= BASE_PATH; ?>css/print.css" media='print'>
  <title><?= (isset($this->data['title'])) ? $this->data['title'] : $this->data['entity']; ?></title>
</head>
<body>
<div class='container'>