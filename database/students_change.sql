--对应卡号中可以填写多个卡号，卡数位数20->60位变更。

ALTER TABLE `fourwork`.`we_students` 
CHANGE COLUMN `card_num` `card_num` VARCHAR(50) NOT NULL DEFAULT '0' COMMENT '刷卡卡号' ;
