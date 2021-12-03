--
-- Table structure for table `items`
--

CREATE TABLE `items` (
                         `id` int(255) NOT NULL COMMENT 'ID',
                         `name` varchar(255) NOT NULL COMMENT '商品名',
                         `price` int(255) NOT NULL COMMENT '単価',
                         `count` int(255) NOT NULL COMMENT '個数',
                         `total_price` int(255) NOT NULL COMMENT '合計金額',
                         `send_flag` tinyint(1) NOT NULL COMMENT '送信済みフラグ',
                         `created` date NOT NULL COMMENT '登録日時'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='商品テーブル';


--
-- Indexes for table `items`
--
ALTER TABLE `items`
    ADD PRIMARY KEY (`id`);
