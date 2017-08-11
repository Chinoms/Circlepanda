-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Jul 06, 2017 at 11:55 AM
-- Server version: 5.5.42
-- PHP Version: 7.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `circtgfh_pandadb`
--

-- --------------------------------------------------------

--
-- Table structure for table `ad`
--

CREATE TABLE `ad` (
  `id` int(11) NOT NULL,
  `campaign_name` varchar(300) DEFAULT NULL,
  `startdate` varchar(50) DEFAULT NULL,
  `enddate` varchar(50) DEFAULT NULL,
  `objective` varchar(300) DEFAULT NULL,
  `url` varchar(400) DEFAULT NULL,
  `target_country` varchar(200) DEFAULT NULL,
  `target_states` varchar(100) DEFAULT NULL,
  `target_gender` varchar(20) DEFAULT NULL,
  `language` varchar(100) DEFAULT NULL,
  `keyword` varchar(1000) DEFAULT NULL,
  `description` varchar(250) DEFAULT NULL,
  `image_id` int(11) DEFAULT NULL,
  `adtoken` varchar(30) DEFAULT NULL,
  `paid` int(2) DEFAULT NULL,
  `user_id` int(20) DEFAULT NULL,
  `ad_create_date` varchar(20) DEFAULT NULL,
  `min_age` int(4) DEFAULT NULL,
  `max_age` int(4) DEFAULT NULL,
  `views` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `name` varchar(300) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `about` text NOT NULL,
  `address` varchar(300) NOT NULL,
  `image_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `admin_img`
--

CREATE TABLE `admin_img` (
  `id` int(11) NOT NULL,
  `filename` varchar(200) NOT NULL,
  `mime_type` varchar(50) NOT NULL,
  `file_size` int(11) NOT NULL,
  `image_data` mediumblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ad_image`
--

CREATE TABLE `ad_image` (
  `image_id` int(11) NOT NULL,
  `filename` varchar(200) NOT NULL,
  `mime_type` varchar(50) NOT NULL,
  `file_size` int(11) NOT NULL,
  `image_data` mediumblob NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `app`
--

CREATE TABLE `app` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `app_id` varchar(50) NOT NULL,
  `app_name` text,
  `contact_email` text NOT NULL,
  `app_secret_key` text,
  `app_public_key` text,
  `app_desc` text NOT NULL,
  `app_url` text NOT NULL,
  `app_category` text NOT NULL,
  `policy_url` text NOT NULL,
  `terms_url` text NOT NULL,
  `app_image_id` int(11) NOT NULL,
  `website_url` text NOT NULL,
  `callback_url` text NOT NULL,
  `webhook_url` text,
  `mode` int(11) NOT NULL,
  `created_date` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `app_icon`
--

CREATE TABLE `app_icon` (
  `id` int(11) NOT NULL,
  `filename` varchar(200) NOT NULL,
  `mime_type` varchar(50) NOT NULL,
  `file_size` int(11) NOT NULL,
  `image_data` mediumblob NOT NULL,
  `app_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `app_product`
--

CREATE TABLE `app_product` (
  `id` int(11) NOT NULL,
  `app_id` text NOT NULL,
  `product_name` text NOT NULL,
  `mode` int(11) NOT NULL,
  `platform` text NOT NULL,
  `pk` text NOT NULL,
  `sk` text NOT NULL,
  `added_date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `career`
--

CREATE TABLE `career` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `location` varchar(200) NOT NULL,
  `bio` text NOT NULL,
  `github_url` text NOT NULL,
  `status` varchar(50) NOT NULL,
  `worktime` varchar(100) NOT NULL,
  `considered` int(1) NOT NULL,
  `date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `channel`
--

CREATE TABLE `channel` (
  `channel_id` int(11) NOT NULL,
  `channel_name` varchar(200) NOT NULL,
  `channel_bio` text NOT NULL,
  `channel_members` int(20) NOT NULL,
  `channel_color` varchar(40) NOT NULL,
  `channel_view` varchar(20) NOT NULL,
  `channel_type` varchar(20) NOT NULL,
  `channel_regdate` varchar(100) NOT NULL,
  `user_id` int(50) NOT NULL,
  `cover_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `channel_like`
--

CREATE TABLE `channel_like` (
  `like_id` int(11) NOT NULL,
  `post_id` int(40) NOT NULL,
  `channel_id` int(11) NOT NULL,
  `user_id` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `channel_post`
--

CREATE TABLE `channel_post` (
  `post_id` int(11) NOT NULL,
  `status` text NOT NULL,
  `date` varchar(50) NOT NULL,
  `likes` int(20) NOT NULL,
  `user_id` int(30) NOT NULL,
  `channel_id` int(11) NOT NULL,
  `channel_color` varchar(100) NOT NULL,
  `channel_name` varchar(200) NOT NULL,
  `image_path` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `collection`
--

CREATE TABLE `collection` (
  `Collection_id` int(20) NOT NULL,
  `Col_name` varchar(150) NOT NULL,
  `Col_bio` text NOT NULL,
  `Col_regdate` varchar(50) NOT NULL,
  `Collection_type` varchar(40) NOT NULL,
  `Collection_view` varchar(10) NOT NULL,
  `Collection_color` varchar(30) NOT NULL,
  `collection_followers` int(40) NOT NULL,
  `user_id` int(11) NOT NULL,
  `cover_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `collection_like`
--

CREATE TABLE `collection_like` (
  `like_id` int(11) NOT NULL,
  `post_id` int(30) NOT NULL,
  `collection_id` int(11) NOT NULL,
  `user_id` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `collection_post`
--

CREATE TABLE `collection_post` (
  `post_id` int(20) NOT NULL,
  `collection_id` int(11) NOT NULL,
  `collection_name` varchar(150) NOT NULL,
  `collection_color` varchar(150) NOT NULL,
  `status` text NOT NULL,
  `likes` int(20) NOT NULL,
  `user_id` int(20) NOT NULL,
  `date` varchar(50) NOT NULL,
  `image_path` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `comment_channel_post`
--

CREATE TABLE `comment_channel_post` (
  `comment_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `image_id` int(11) NOT NULL,
  `comment` varchar(1000) NOT NULL,
  `comment_date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `comment_collection_post`
--

CREATE TABLE `comment_collection_post` (
  `comment_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `image_id` int(11) NOT NULL,
  `comment` varchar(1000) NOT NULL,
  `comment_date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `comment_page_post`
--

CREATE TABLE `comment_page_post` (
  `comment_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `image_id` int(11) NOT NULL,
  `comment` varchar(1000) NOT NULL,
  `comment_date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `comment_post`
--

CREATE TABLE `comment_post` (
  `comment_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `fullname` varchar(300) NOT NULL,
  `image_id` int(11) NOT NULL,
  `comment` varchar(1000) NOT NULL,
  `comment_date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cover_channel`
--

CREATE TABLE `cover_channel` (
  `image_id` int(11) NOT NULL,
  `filename` varchar(200) NOT NULL,
  `mime_type` varchar(50) NOT NULL,
  `file_size` int(11) NOT NULL,
  `image_data` mediumblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cover_collection`
--

CREATE TABLE `cover_collection` (
  `image_id` int(11) NOT NULL,
  `filename` varchar(200) NOT NULL,
  `mime_type` varchar(50) NOT NULL,
  `file_size` int(11) NOT NULL,
  `image_data` mediumblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cover_page`
--

CREATE TABLE `cover_page` (
  `image_id` int(11) NOT NULL,
  `filename` varchar(200) NOT NULL,
  `mime_type` varchar(50) NOT NULL,
  `file_size` int(11) NOT NULL,
  `image_data` mediumblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cover_photo`
--

CREATE TABLE `cover_photo` (
  `user_cover_id` int(20) NOT NULL,
  `filename` varchar(200) NOT NULL,
  `mime_type` varchar(50) NOT NULL,
  `file_size` int(11) NOT NULL,
  `image_data` mediumblob NOT NULL,
  `user_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `creditcard_details`
--

CREATE TABLE `creditcard_details` (
  `card_id` int(11) NOT NULL,
  `card_name` varchar(200) NOT NULL,
  `card_number` int(20) NOT NULL,
  `cvv2` int(6) NOT NULL,
  `validexp` varchar(10) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dash_report`
--

CREATE TABLE `dash_report` (
  `report_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `report_message` text NOT NULL,
  `report_date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dash_user_representation`
--

CREATE TABLE `dash_user_representation` (
  `id` int(11) NOT NULL,
  `year` varchar(100) NOT NULL,
  `month` varchar(20) NOT NULL,
  `no` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dash_whatsnew`
--

CREATE TABLE `dash_whatsnew` (
  `new_id` int(11) NOT NULL,
  `whatsnew` varchar(60) NOT NULL,
  `what_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `event_id` int(11) NOT NULL,
  `event_name` varchar(100) NOT NULL,
  `event_description` varchar(500) NOT NULL,
  `event_venue` varchar(40) NOT NULL,
  `event_startdate` varchar(50) NOT NULL,
  `event_enddate` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL,
  `event_date_diff` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `id` int(11) NOT NULL,
  `q` text NOT NULL,
  `a` text NOT NULL,
  `keyword` text NOT NULL,
  `date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fb_users`
--

CREATE TABLE `fb_users` (
  `id` int(11) NOT NULL,
  `Fuid` text NOT NULL,
  `Ffname` text NOT NULL,
  `Femail` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `follow_friend`
--

CREATE TABLE `follow_friend` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `friends_id` int(20) NOT NULL,
  `date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hometour`
--

CREATE TABLE `hometour` (
  `demo_id` int(30) NOT NULL,
  `user_id` int(20) NOT NULL,
  `activated` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `image_id` int(20) NOT NULL,
  `filename` varchar(200) NOT NULL,
  `mime_type` varchar(50) NOT NULL,
  `file_size` int(11) NOT NULL,
  `image_data` mediumblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `join_channel`
--

CREATE TABLE `join_channel` (
  `join_id` int(11) NOT NULL,
  `channel_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `join_date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `join_collection`
--

CREATE TABLE `join_collection` (
  `join_id` int(11) NOT NULL,
  `collection_id` int(11) NOT NULL,
  `user_id` int(20) NOT NULL,
  `join_date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `join_page`
--

CREATE TABLE `join_page` (
  `join_id` int(11) NOT NULL,
  `page_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `join_date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `like`
--

CREATE TABLE `like` (
  `like_id` int(30) NOT NULL,
  `no_like` int(40) NOT NULL,
  `post_id` int(40) NOT NULL,
  `user_id` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `login_attempt`
--

CREATE TABLE `login_attempt` (
  `id` int(11) NOT NULL,
  `ip_address` varchar(100) NOT NULL,
  `browser_v` text NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` text NOT NULL,
  `time_login` varchar(100) CHARACTER SET latin1 COLLATE latin1_bin DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `messenger`
--

CREATE TABLE `messenger` (
  `chat_id` int(11) NOT NULL,
  `chat_thread` varchar(11) NOT NULL,
  `delete_status` int(11) NOT NULL,
  `message` text NOT NULL,
  `sender_id` int(11) NOT NULL,
  `attachment` text NOT NULL,
  `participant_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `messenger_info`
--

CREATE TABLE `messenger_info` (
  `id` int(11) NOT NULL,
  `thread_id` int(11) NOT NULL,
  `started` varchar(100) NOT NULL,
  `started_by` varchar(100) NOT NULL,
  `delete_status` int(11) NOT NULL,
  `participant_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `messenger_participant`
--

CREATE TABLE `messenger_participant` (
  `id` int(11) NOT NULL,
  `thread_id` varchar(20) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `activity_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `user_image_id` text NOT NULL,
  `message` varchar(200) NOT NULL,
  `action_date` varchar(50) NOT NULL,
  `your_id` int(11) NOT NULL,
  `seen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `page`
--

CREATE TABLE `page` (
  `page_id` int(20) NOT NULL,
  `page_name` varchar(200) NOT NULL,
  `page_desc` text NOT NULL,
  `page_regdate` varchar(50) NOT NULL,
  `page_view` varchar(20) NOT NULL,
  `page_type` varchar(30) NOT NULL,
  `page_color` varchar(50) NOT NULL,
  `page_members` int(30) NOT NULL,
  `user_id` int(11) NOT NULL,
  `cover_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `page_like`
--

CREATE TABLE `page_like` (
  `like_id` int(30) NOT NULL,
  `no_like` int(20) NOT NULL,
  `post_id` int(30) NOT NULL,
  `page_name` varchar(120) NOT NULL,
  `user_id` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `page_post`
--

CREATE TABLE `page_post` (
  `post_id` int(11) NOT NULL,
  `status` text NOT NULL,
  `date` varchar(50) NOT NULL,
  `likes` int(20) NOT NULL,
  `user_id` int(20) NOT NULL,
  `page_id` int(11) NOT NULL,
  `page_color` varchar(30) NOT NULL,
  `page_name` varchar(200) NOT NULL,
  `image_path` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `post_img`
--

CREATE TABLE `post_img` (
  `image_id` int(11) NOT NULL,
  `filename` varchar(200) NOT NULL,
  `mime_type` varchar(50) NOT NULL,
  `file_size` int(11) NOT NULL,
  `image_data` mediumblob NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `report_id` int(30) NOT NULL,
  `complain` text NOT NULL,
  `user_id` int(20) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `screenshot_id` varchar(30) NOT NULL,
  `report_date` varchar(50) NOT NULL,
  `solved` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `saved`
--

CREATE TABLE `saved` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `share_post`
--

CREATE TABLE `share_post` (
  `share_id` int(20) NOT NULL,
  `post_id` int(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_like` int(20) NOT NULL,
  `visible` varchar(11) NOT NULL,
  `share_date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sitetour`
--

CREATE TABLE `sitetour` (
  `tour_id` int(20) NOT NULL,
  `status` int(1) NOT NULL,
  `notification` int(1) NOT NULL,
  `messages` int(1) NOT NULL,
  `user_id` int(20) NOT NULL,
  `badge` int(1) NOT NULL,
  `hide_greeting` int(1) NOT NULL,
  `personal_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `subscribe`
--

CREATE TABLE `subscribe` (
  `email_id` int(11) NOT NULL,
  `email` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `unique_visit_analytics`
--

CREATE TABLE `unique_visit_analytics` (
  `id` int(20) NOT NULL,
  `ip` varchar(50) NOT NULL,
  `region` varchar(200) NOT NULL,
  `user_agent` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `url_record`
--

CREATE TABLE `url_record` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `link_url` text NOT NULL,
  `site_meta` text NOT NULL,
  `site_banned` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `fullname` varchar(300) NOT NULL,
  `user_name` varchar(60) NOT NULL,
  `email` varchar(100) NOT NULL,
  `passcode` varchar(40) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `year` varchar(4) NOT NULL,
  `month` varchar(15) NOT NULL,
  `day` varchar(3) NOT NULL,
  `bio` text NOT NULL,
  `phone` varchar(20) NOT NULL,
  `country` varchar(50) NOT NULL,
  `state` varchar(40) NOT NULL,
  `city` varchar(30) NOT NULL,
  `user_cover_id` int(20) NOT NULL,
  `ip` varchar(20) NOT NULL,
  `user_token` varchar(20) NOT NULL,
  `join_date` varchar(100) NOT NULL,
  `confirmed` int(2) NOT NULL,
  `verified_user` int(11) NOT NULL,
  `profile_pic_id` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users_status`
--

CREATE TABLE `users_status` (
  `users_status_id` int(20) NOT NULL,
  `relationship` varchar(20) DEFAULT NULL,
  `looking` varchar(20) DEFAULT NULL,
  `school` varchar(250) DEFAULT NULL,
  `school_from` varchar(50) DEFAULT NULL,
  `school_to` varchar(50) DEFAULT NULL,
  `work` varchar(100) DEFAULT NULL,
  `work_from` varchar(50) DEFAULT NULL,
  `work_to` varchar(50) DEFAULT NULL,
  `work_as` varchar(50) DEFAULT NULL,
  `studied` varchar(300) DEFAULT NULL,
  `website` varchar(300) DEFAULT NULL,
  `about` text,
  `facebook_url` varchar(100) DEFAULT NULL,
  `twitter_url` varchar(100) DEFAULT NULL,
  `instagram_url` varchar(100) DEFAULT NULL,
  `address` varchar(250) DEFAULT NULL,
  `user_id` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_active`
--

CREATE TABLE `user_active` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `active_date` varchar(50) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_analytics`
--

CREATE TABLE `user_analytics` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `timespent` varchar(30) NOT NULL,
  `timespent_at` varchar(200) NOT NULL,
  `user_ip` varchar(100) NOT NULL,
  `datespent` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_interest`
--

CREATE TABLE `user_interest` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `interest` text NOT NULL,
  `date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_post`
--

CREATE TABLE `user_post` (
  `post_id` int(30) NOT NULL,
  `fullname` varchar(300) NOT NULL,
  `view` varchar(10) NOT NULL,
  `status` text NOT NULL,
  `date` varchar(200) NOT NULL,
  `likes` int(40) NOT NULL,
  `user_id` int(30) NOT NULL,
  `profile_pic_id` int(30) NOT NULL,
  `image_path` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ad`
--
ALTER TABLE `ad`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `adtoken` (`adtoken`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_img`
--
ALTER TABLE `admin_img`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ad_image`
--
ALTER TABLE `ad_image`
  ADD PRIMARY KEY (`image_id`);

--
-- Indexes for table `app`
--
ALTER TABLE `app`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `app_icon`
--
ALTER TABLE `app_icon`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `app_product`
--
ALTER TABLE `app_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `career`
--
ALTER TABLE `career`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `channel`
--
ALTER TABLE `channel`
  ADD PRIMARY KEY (`channel_id`);

--
-- Indexes for table `channel_like`
--
ALTER TABLE `channel_like`
  ADD PRIMARY KEY (`like_id`);

--
-- Indexes for table `channel_post`
--
ALTER TABLE `channel_post`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `collection`
--
ALTER TABLE `collection`
  ADD PRIMARY KEY (`Collection_id`);

--
-- Indexes for table `collection_like`
--
ALTER TABLE `collection_like`
  ADD PRIMARY KEY (`like_id`);

--
-- Indexes for table `collection_post`
--
ALTER TABLE `collection_post`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `comment_channel_post`
--
ALTER TABLE `comment_channel_post`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `comment_collection_post`
--
ALTER TABLE `comment_collection_post`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `comment_page_post`
--
ALTER TABLE `comment_page_post`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `comment_post`
--
ALTER TABLE `comment_post`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `cover_channel`
--
ALTER TABLE `cover_channel`
  ADD PRIMARY KEY (`image_id`);

--
-- Indexes for table `cover_collection`
--
ALTER TABLE `cover_collection`
  ADD PRIMARY KEY (`image_id`);

--
-- Indexes for table `cover_page`
--
ALTER TABLE `cover_page`
  ADD PRIMARY KEY (`image_id`);

--
-- Indexes for table `cover_photo`
--
ALTER TABLE `cover_photo`
  ADD PRIMARY KEY (`user_cover_id`);

--
-- Indexes for table `creditcard_details`
--
ALTER TABLE `creditcard_details`
  ADD PRIMARY KEY (`card_id`);

--
-- Indexes for table `dash_report`
--
ALTER TABLE `dash_report`
  ADD PRIMARY KEY (`report_id`);

--
-- Indexes for table `dash_user_representation`
--
ALTER TABLE `dash_user_representation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dash_whatsnew`
--
ALTER TABLE `dash_whatsnew`
  ADD PRIMARY KEY (`new_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fb_users`
--
ALTER TABLE `fb_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `follow_friend`
--
ALTER TABLE `follow_friend`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hometour`
--
ALTER TABLE `hometour`
  ADD PRIMARY KEY (`demo_id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`image_id`);

--
-- Indexes for table `join_channel`
--
ALTER TABLE `join_channel`
  ADD PRIMARY KEY (`join_id`);

--
-- Indexes for table `join_collection`
--
ALTER TABLE `join_collection`
  ADD PRIMARY KEY (`join_id`);

--
-- Indexes for table `join_page`
--
ALTER TABLE `join_page`
  ADD PRIMARY KEY (`join_id`);

--
-- Indexes for table `like`
--
ALTER TABLE `like`
  ADD PRIMARY KEY (`like_id`);

--
-- Indexes for table `login_attempt`
--
ALTER TABLE `login_attempt`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messenger`
--
ALTER TABLE `messenger`
  ADD PRIMARY KEY (`chat_id`);

--
-- Indexes for table `messenger_info`
--
ALTER TABLE `messenger_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messenger_participant`
--
ALTER TABLE `messenger_participant`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`activity_id`);

--
-- Indexes for table `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`page_id`);

--
-- Indexes for table `page_like`
--
ALTER TABLE `page_like`
  ADD PRIMARY KEY (`like_id`);

--
-- Indexes for table `page_post`
--
ALTER TABLE `page_post`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `post_img`
--
ALTER TABLE `post_img`
  ADD PRIMARY KEY (`image_id`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`report_id`);

--
-- Indexes for table `saved`
--
ALTER TABLE `saved`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `post_id` (`post_id`);

--
-- Indexes for table `share_post`
--
ALTER TABLE `share_post`
  ADD PRIMARY KEY (`share_id`);

--
-- Indexes for table `sitetour`
--
ALTER TABLE `sitetour`
  ADD PRIMARY KEY (`tour_id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `subscribe`
--
ALTER TABLE `subscribe`
  ADD PRIMARY KEY (`email_id`);

--
-- Indexes for table `unique_visit_analytics`
--
ALTER TABLE `unique_visit_analytics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `url_record`
--
ALTER TABLE `url_record`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `users_status`
--
ALTER TABLE `users_status`
  ADD PRIMARY KEY (`users_status_id`);

--
-- Indexes for table `user_active`
--
ALTER TABLE `user_active`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_analytics`
--
ALTER TABLE `user_analytics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_interest`
--
ALTER TABLE `user_interest`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_post`
--
ALTER TABLE `user_post`
  ADD PRIMARY KEY (`post_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ad`
--
ALTER TABLE `ad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `admin_img`
--
ALTER TABLE `admin_img`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ad_image`
--
ALTER TABLE `ad_image`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `app`
--
ALTER TABLE `app`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `app_icon`
--
ALTER TABLE `app_icon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `app_product`
--
ALTER TABLE `app_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `career`
--
ALTER TABLE `career`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `channel`
--
ALTER TABLE `channel`
  MODIFY `channel_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `channel_like`
--
ALTER TABLE `channel_like`
  MODIFY `like_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `channel_post`
--
ALTER TABLE `channel_post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `collection`
--
ALTER TABLE `collection`
  MODIFY `Collection_id` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `collection_like`
--
ALTER TABLE `collection_like`
  MODIFY `like_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `collection_post`
--
ALTER TABLE `collection_post`
  MODIFY `post_id` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `comment_channel_post`
--
ALTER TABLE `comment_channel_post`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `comment_collection_post`
--
ALTER TABLE `comment_collection_post`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `comment_page_post`
--
ALTER TABLE `comment_page_post`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `comment_post`
--
ALTER TABLE `comment_post`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cover_channel`
--
ALTER TABLE `cover_channel`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cover_collection`
--
ALTER TABLE `cover_collection`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cover_page`
--
ALTER TABLE `cover_page`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cover_photo`
--
ALTER TABLE `cover_photo`
  MODIFY `user_cover_id` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `creditcard_details`
--
ALTER TABLE `creditcard_details`
  MODIFY `card_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dash_report`
--
ALTER TABLE `dash_report`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dash_user_representation`
--
ALTER TABLE `dash_user_representation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dash_whatsnew`
--
ALTER TABLE `dash_whatsnew`
  MODIFY `new_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fb_users`
--
ALTER TABLE `fb_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `follow_friend`
--
ALTER TABLE `follow_friend`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `hometour`
--
ALTER TABLE `hometour`
  MODIFY `demo_id` int(30) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `image_id` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `join_channel`
--
ALTER TABLE `join_channel`
  MODIFY `join_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `join_collection`
--
ALTER TABLE `join_collection`
  MODIFY `join_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `join_page`
--
ALTER TABLE `join_page`
  MODIFY `join_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `like`
--
ALTER TABLE `like`
  MODIFY `like_id` int(30) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `login_attempt`
--
ALTER TABLE `login_attempt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `messenger`
--
ALTER TABLE `messenger`
  MODIFY `chat_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `messenger_info`
--
ALTER TABLE `messenger_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `messenger_participant`
--
ALTER TABLE `messenger_participant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `activity_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `page`
--
ALTER TABLE `page`
  MODIFY `page_id` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `page_like`
--
ALTER TABLE `page_like`
  MODIFY `like_id` int(30) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `page_post`
--
ALTER TABLE `page_post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `post_img`
--
ALTER TABLE `post_img`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `report_id` int(30) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `saved`
--
ALTER TABLE `saved`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `share_post`
--
ALTER TABLE `share_post`
  MODIFY `share_id` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sitetour`
--
ALTER TABLE `sitetour`
  MODIFY `tour_id` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `subscribe`
--
ALTER TABLE `subscribe`
  MODIFY `email_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `unique_visit_analytics`
--
ALTER TABLE `unique_visit_analytics`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `url_record`
--
ALTER TABLE `url_record`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users_status`
--
ALTER TABLE `users_status`
  MODIFY `users_status_id` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_active`
--
ALTER TABLE `user_active`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_analytics`
--
ALTER TABLE `user_analytics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_interest`
--
ALTER TABLE `user_interest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_post`
--
ALTER TABLE `user_post`
  MODIFY `post_id` int(30) NOT NULL AUTO_INCREMENT;
