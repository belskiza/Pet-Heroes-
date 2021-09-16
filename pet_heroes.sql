
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";
    
CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `first_name` varchar(128) NOT NULL,
  `last_name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `acc_type` int(1) NOT NULL COMMENT '0 = adopter, 1 = owner'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `users` (`user_id`, `username`, `password`, `first_name`, `last_name`, `email`, `acc_type`) VALUES
(3, 'dberg99', '$2y$10$Ir7VIUOD.ZO.9cHIqFkg6.68av86pbmOn3nvY/iZRSLUkIPzppnai', 'Dustin', 'Bergman', 'dustinbergman82@gmail.com', 0);

ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;


CREATE TABLE 'account_setup' (
    'user_id' int(11) NOT NULL,
    'preferences_completed' BOOL NOT NULL DEFAULT False,
    'profile_picture_uploaded' BOOL NOT NULL DEFAULT False
)

INSERT INTO `account_setup` (`user_id`, `preferences_completed`, `profile_picture_uploaded`) VALUES
(3, False, False);

ALTER TABLE `accountSetup`
  ADD PRIMARY KEY (`user_id`);


COMMIT;
