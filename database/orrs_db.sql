
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";




CREATE TABLE `message_list` (
  `id` int(30) NOT NULL,
  `fullname` text NOT NULL,
  `contact` text NOT NULL,
  `email` text NOT NULL,
  `message` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



INSERT INTO `message_list` (`id`, `fullname`, `contact`, `email`, `message`, `status`, `date_created`) VALUES
(1, 'Siva sai', '09456123789', 'siva@sample.com', 'Food system is bad!!', 1, '2022-11-06 09:13:14');



CREATE TABLE `reservation_list` (
  `id` int(30) NOT NULL,
  `seat_num` varchar(50) NOT NULL,
  `schedule_id` int(30) NOT NULL,
  `schedule` datetime NOT NULL,
  `firstname` text NOT NULL,
  `middlename` text NOT NULL,
  `lastname` text NOT NULL,
  `seat_type` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1=First Class, 2 = Economy',
  `fare_amount` float NOT NULL DEFAULT 0,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



INSERT INTO `reservation_list` (`id`, `seat_num`, `schedule_id`, `schedule`, `firstname`, `middlename`, `lastname`, `seat_type`, `fare_amount`, `date_created`, `date_updated`) VALUES
(1, 'S-005', 1, '2022-01-07 07:00:00', 'Mohith', 'D', 'Aruru', 1, 50, '2022-11-05 16:26:00', NULL),
(3, 'S-120', 1, '2022-01-07 07:00:00', 'Honey', 'D', 'Kopulla', 1, 50, '2022-11-05 16:27:56', NULL),
(4, 'D-68', 2, '2022-01-07 08:00:00', 'Mohith', 'D', 'Aruru', 1, 250, '2022-11-05 16:31:27', NULL),
(5, 'B-72', 2, '2022-01-07 08:00:00', 'Srikanth', 'C', 'kapa', 1, 250, '2022-11-05 16:31:27', NULL),
(6, 'A-006', 1, '2022-01-07 07:00:00', 'Mohith', 'D', 'Aruru', 2, 25, '2022-11-06 08:35:53', NULL),
(7, 'S-056', 1, '2022-01-07 07:00:00', 'Srikanth', 'C ', 'kapa', 2, 25, '2022-11-06 08:35:53', NULL),
(8, 'E-001', 2, '2022-01-07 08:00:00', 'Honey', 'D', 'Kopulla', 2, 170, '2022-11-06 09:24:57', NULL),
(9, 'E-002', 2, '2022-01-07 08:00:00', 'Samantha', 'C', 'Kopulla', 2, 170, '2022-11-06 09:24:57', NULL);



CREATE TABLE `schedule_list` (
  `id` int(30) NOT NULL,
  `code` varchar(100) NOT NULL,
  `train_id` int(30) NOT NULL,
  `route_from` text NOT NULL,
  `route_to` text NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1 = daily, 2= One-Time Schedule',
  `date_schedule` date DEFAULT NULL,
  `time_schedule` time NOT NULL,
  `first_class_fare` float NOT NULL DEFAULT 0,
  `economy_fare` float NOT NULL DEFAULT 0,
  `delete_flag` tinyint(1) NOT NULL DEFAULT 0,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO `schedule_list` (`id`, `code`, `train_id`, `route_from`, `route_to`, `type`, `date_schedule`, `time_schedule`, `first_class_fare`, `economy_fare`, `delete_flag`, `date_created`, `date_updated`) VALUES
(1, '202201-0001', 1, 'MGR.Chennai Central', 'Tirupati', 1, NULL, '07:00:00', 50, 25, 0, '2022-11-05 13:14:45', '2022-11-05 13:23:17'),
(2, '202201-0003', 2, 'Tirupati', 'Vijayawada', 2, '2022-01-07', '08:00:00', 250, 170, 0, '2022-11-05 13:17:49', '2022-11-05 13:25:18'),
(3, '202201-0002', 1, 'MGR.Chennai Central', 'Puducherry', 1, NULL, '08:30:00', 100, 75, 0, '2022-11-05 13:18:25', '2022-11-05 13:24:28'),
(4, '202201-0004', 1, 'MGR.Chennai Central', 'Hyderabad', 1, NULL, '00:00:00', 123, 89, 1, '2022-11-05 13:59:44', '2022-11-05 13:59:56');



CREATE TABLE `system_info` (
  `id` int(30) NOT NULL,
  `meta_field` text NOT NULL,
  `meta_value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



INSERT INTO `system_info` (`id`, `meta_field`, `meta_value`) VALUES
(1, 'name', 'Train Ticket
 Reservation System'),
(6, 'short_name', 'Online Railway Ticket Reservation System'),
(11, 'logo', 'uploads/logo.jpg'),
(13, 'user_avatar', 'uploads/user_avatar.jpg'),
(14, 'cover', 'uploads/train1.jpg'),
(15, 'content', 'Array'),
(16, 'email', 'Querry@gmail.com'),
(17, 'contact', '0123456789/985632144'),
(18, 'from_time', '11:00'),
(19, 'to_time', '21:30'),
(20, 'address', '2/294 A, Navalur,OMR Road');



CREATE TABLE `train_list` (
  `id` int(30) NOT NULL,
  `code` varchar(100) NOT NULL,
  `name` text NOT NULL,
  `first_class_capacity` float NOT NULL DEFAULT 0,
  `economy_capacity` float NOT NULL DEFAULT 0,
  `delete_flag` tinyint(1) NOT NULL DEFAULT 0,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



INSERT INTO `train_list` (`id`, `code`, `name`, `first_class_capacity`, `economy_capacity`, `delete_flag`, `date_created`, `date_updated`) VALUES
(1, 'TIR-1001', 'SapthagirExpress', 100, 200, 0, '2022-11-05 11:05:42', '2022-01-05 16:27:47'),
(2, 'TIR-1002', 'Seshadri Express', 100, 200, 0, '2022-11-05 11:11:41', NULL),
(3, 'TIR-1003', 'Andaman Express', 150, 300, 0, '2022-11-05 11:11:56', NULL),
(4, 'TIR-1004', 'Puducherry Express', 150, 300, 0, '2022-11-05 11:12:15', NULL),
(5, 'TIR-1005', 'Vishaka Express', 800, 1500, 1, '2022-11-05 11:13:00', '2022-11-05 11:13:14');



CREATE TABLE `users` (
  `id` int(50) NOT NULL,
  `firstname` varchar(250) NOT NULL,
  `middlename` text DEFAULT NULL,
  `lastname` varchar(250) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `avatar` text DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `type` tinyint(1) NOT NULL DEFAULT 0,
  `status` int(1) NOT NULL DEFAULT 1 COMMENT '0=not verified, 1 = verified',
  `date_added` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO `users` (`id`, `firstname`, `middlename`, `lastname`, `username`, `password`, `avatar`, `last_login`, `type`, `status`, `date_added`, `date_updated`) VALUES
(1, 'Adminstrator', NULL, 'Admin', 'admin', '0192023a7bbd73250516f069df18b500', 'uploads/logo.jpg', NULL, 1, 1, '2022-11-20 14:02:37', '2022-11-14 15:47:08'),
(4, 'Sai', NULL, 'Lokesh', 'slou', '1ed1255790523a907da869eab7306f5a', 'uploads/logo.jpg', NULL, 2, 1, '2022-11-05 09:36:56', '2022-11-05 09:37:27');


ALTER TABLE `message_list`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `reservation_list`
  ADD PRIMARY KEY (`id`),
  ADD KEY `schedule_id` (`schedule_id`);


ALTER TABLE `schedule_list`
  ADD PRIMARY KEY (`id`),
  ADD KEY `train_id` (`train_id`);


ALTER TABLE `system_info`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `train_list`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `message_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;


ALTER TABLE `reservation_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;


ALTER TABLE `schedule_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;


ALTER TABLE `system_info`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;


ALTER TABLE `train_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;


ALTER TABLE `users`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;


ALTER TABLE `reservation_list`
  ADD CONSTRAINT `reservation_list_ibfk_1` FOREIGN KEY (`schedule_id`) REFERENCES `schedule_list` (`id`) ON DELETE CASCADE;


ALTER TABLE `schedule_list`
  ADD CONSTRAINT `schedule_list_ibfk_1` FOREIGN KEY (`train_id`) REFERENCES `train_list` (`id`) ON DELETE CASCADE;
COMMIT;

