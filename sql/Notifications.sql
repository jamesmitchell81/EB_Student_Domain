SELECT n.Title, n.Body, n.NotificationDate, s.Title, s.FirstName, s.Surname
FROM Notifications n
INNER JOIN Staff s ON s.idStaff = n.idStaff
INNER JOIN NotificationReceivers r ON r.idNotifications = n.idNotifications
WHERE r.idStudent = 20150001;


SELECT * FROM Notifications;