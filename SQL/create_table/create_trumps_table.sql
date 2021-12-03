--
-- Table structure for table `trumps`
--

CREATE TABLE `trumps` (
                          `id` int(100) NOT NULL COMMENT 'ID',
                          `mark_id` int(4) NOT NULL COMMENT 'マークID',
                          `number` int(100) NOT NULL COMMENT 'カードNo',
                          `created` date NOT NULL COMMENT '登録日時',
                          `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='トランプテーブル';

--
-- Indexes for table `trumps`
--
ALTER TABLE `trumps`
    ADD PRIMARY KEY (`id`);
