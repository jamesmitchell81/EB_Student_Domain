<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="<?= BASE_PATH; ?>css/reset.css">
  <link rel="stylesheet" href="<?= BASE_PATH; ?>css/base.css">
  <link rel="stylesheet" href="<?= BASE_PATH; ?>css/attendance.css">
  <link rel="stylesheet" href="<?= BASE_PATH; ?>css/tables.css">
  <link rel="stylesheet" href="<?= BASE_PATH; ?>css/assignments.css">
  <link rel="stylesheet" href="<?= BASE_PATH; ?>css/signin.css">
  <link rel="stylesheet" href="<?= BASE_PATH; ?>css/timetable.css">
  <link rel="stylesheet" href="<?= BASE_PATH; ?>css/diary.css">
  <link rel="stylesheet" href="<?= BASE_PATH; ?>css/notification.css">
  <link rel="stylesheet" href="<?= BASE_PATH; ?>css/forms.css">
  <link rel="stylesheet" href="<?= BASE_PATH; ?>css/media_queries.css">
  <link rel="stylesheet" href="<?= BASE_PATH; ?>css/print.css" media='print'>
  <title><?= (isset($this->data['title'])) ? $this->data['title'] : $this->data['entity']; ?></title>
</head>
<body>
<div class='container'>