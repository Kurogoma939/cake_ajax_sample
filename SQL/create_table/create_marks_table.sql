--
-- Table structure for table `marks`
--

CREATE TABLE `marks` (
                         `id` int(4) NOT NULL COMMENT 'ID',
                         `name` varchar(10) NOT NULL COMMENT 'マーク名',
                         `created` date NOT NULL COMMENT '作成日時'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='マークテーブル';

--
-- Indexes for table `marks`
--
ALTER TABLE `marks`
    ADD PRIMARY KEY (`id`),
    ADD UNIQUE KEY `name` (`name`);

