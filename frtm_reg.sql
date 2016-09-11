drop table if exists frtm_reg;
create table if not exists frtm_reg (
	id int unsigned not null auto_increment,
	primary key (id),
	name varchar(15) not null default '',
	sex varchar(6) not null default '',
	tel varchar(11) not null default '',
	weixin varchar(21) not null default '',
	address varchar(50) not null default '',
	home tinyint unsigned,
	area tinyint unsigned not null default 0,
	regtime int unsigned not null default 0
) engine=myisam default charset=gbk;





alter table frtm_reg add address varchar(50) not null default '' after weixin;
alter table frtm_reg add home tinyint unsigned after address;
alter table frtm_reg add area tinyint unsigned not null default 0 after home;
