-- 1711140136 添加院系数据
insert into yefh_dep values('计算机学院');
insert into yefh_dep values('软件工程学院');
insert into yefh_dep values('数字媒体学院');


-- 1711140136 添加专业数据
insert into yefh_major
	(major_name,major_lenght,dep_name)
	values
	('计算机应用技术',3,'计算机学院');
insert into yefh_major
	(major_name,major_lenght,dep_name)
	values
	('计算机网络技术',3,'计算机学院');
insert into yefh_major
	(major_name,major_lenght,dep_name)
	values
	('软件技术',3,'软件工程学院');


-- 1711140136 添加班级数据
insert into yefh_class
	(stu_class,stu_year,major_name)
	values
	('计算机应用技术3-3',2017,'计算机应用技术');
insert into yefh_class
	(stu_class,stu_year,major_name)
	values
	('软件技术3-2',2017,'软件技术');
insert into yefh_class
	(stu_class,stu_year,major_name)
	values
	('计算机网络技术1-3',2017,'计算机应用技术');

-- 1711140136 添加学生数据
insert into yefh_stu 
(stu_id,stu_name,stu_pa,stu_class,email,avatar) 
values 
('1703010301','蔡小敏',md5(123456),'计算机应用技术3-3',null,'stu'),
('1703010302','曾健烨',md5(123456),'计算机应用技术3-3',null,'stu'),
('1703010303','陈丹晴',md5(123456),'计算机应用技术3-3',null,'stu'),
('1703010305','陈新雁',md5(123456),'计算机应用技术3-3',null,'stu'),
('1703010306','陈雪琳',md5(123456),'计算机应用技术3-3',null,'stu'),
('1703010307','高升',md5(123456),'计算机应用技术3-3',null,'stu'),
('1703010308','郭子恺',md5(123456),'计算机应用技术3-3',null,'stu'),
('1703010309','何主航',md5(123456),'计算机应用技术3-3',null,'stu'),
('1703010310','黄宝仪',md5(123456),'计算机应用技术3-3',null,'stu'),
('1703010311','黄浩强',md5(123456),'计算机应用技术3-3',null,'stu'),
('1703010312','黄晓婷',md5(123456),'计算机应用技术3-3',null,'stu'),
('1703010313','江旭晖',md5(123456),'计算机应用技术3-3',null,'stu'),
('1703010314','邝嘉峻',md5(123456),'计算机应用技术3-3',null,'stu'),
('1703010315','林浩熙',md5(123456),'计算机应用技术3-3',null,'stu'),
('1703010317','林铠',md5(123456),'计算机应用技术3-3',null,'stu'),
('1703010318','林雅静',md5(123456),'计算机应用技术3-3',null,'stu'),
('1703010319','林彦',md5(123456),'计算机应用技术3-3',null,'stu'),
('1703010320','林养欣',md5(123456),'计算机应用技术3-3',null,'stu'),
('1703010321','刘俊豪',md5(123456),'计算机应用技术3-3',null,'stu'),
('1703010322','刘杏杏',md5(123456),'计算机应用技术3-3',null,'stu'),
('1703010323','陆欣海',md5(123456),'计算机应用技术3-3',null,'stu'),
('1703010324','罗方刊',md5(123456),'计算机应用技术3-3',null,'stu'),
('1703010325','莫晓婷',md5(123456),'计算机应用技术3-3',null,'stu'),
('1703010326','欧嘉明',md5(123456),'计算机应用技术3-3',null,'stu'),
('1703010327','彭志捷',md5(123456),'计算机应用技术3-3',null,'stu'),
('1703010328','邱耿林',md5(123456),'计算机应用技术3-3',null,'stu'),
('1703010330','吴才满',md5(123456),'计算机应用技术3-3',null,'stu'),
('1703010331','吴楚璇',md5(123456),'计算机应用技术3-3',null,'stu'),
('1703010332','吴启森',md5(123456),'计算机应用技术3-3',null,'stu'),
('1703010333','吴顺台',md5(123456),'计算机应用技术3-3',null,'stu'),
('1703010336','徐梓淇',md5(123456),'计算机应用技术3-3',null,'stu'),
('1703010337','许清鹏',md5(123456),'计算机应用技术3-3',null,'stu'),
('1703010338','杨济维',md5(123456),'计算机应用技术3-3',null,'stu'),
('1703010339','余耿杰',md5(123456),'计算机应用技术3-3',null,'stu'),
('1703010340','张福远',md5(123456),'计算机应用技术3-3',null,'stu'),
('1703010341','张铭法',md5(123456),'计算机应用技术3-3',null,'stu'),
('1703010342','郑宝锵*',md5(123456),'计算机应用技术3-3',null,'stu'),
('1703010343','郑东明',md5(123456),'计算机应用技术3-3',null,'stu'),
('1703010344','郑慧婷',md5(123456),'计算机应用技术3-3',null,'stu'),
('1703010345','郑晓冬',md5(123456),'计算机应用技术3-3',null,'stu'),
('1703010346','朱佳丰',md5(123456),'计算机应用技术3-3',null,'stu'),
('1703010347','庄冰凌',md5(123456),'计算机应用技术3-3',null,'stu'),
('1703010348','庄慧婷',md5(123456),'计算机应用技术3-3',null,'stu'),
('1704110138','张钦锐',md5(123456),'计算机应用技术3-3',null,'stu'),
('1711140127','谭永荣',md5(123456),'计算机应用技术3-3',null,'stu'),
('1711140136','叶富豪',md5(123456),'计算机应用技术3-3',null,'stu');


-- 1711140136 添加教师数据
insert into yefh_te
	(te_id,te_name,te_pa,dep_name,pic)
	values
	('1542314','桂荣枝',md5(123456),'计算机学院','te');
insert into yefh_te
	(te_id,te_name,te_pa,dep_name,pic)
	values
	('1215478','唐琪',md5(123456),'计算机学院','te');
insert into yefh_te
	(te_id,te_name,te_pa,dep_name,pic)
	values
	('1021545','汪伟明',md5(123456),'计算机学院','te');


-- 1711140136 添加课程
insert into yefh_course
	values
	(1,"3001456","Web项目应用",2017,"计算机应用技术",4,3,4,01-14,56,"专业核心课","过程性考核"),
	(2,"3001457","C程序设计",2017,"软件技术",4,3,4,01-14,56,"专业基础课","集中考试"),
	(3,"3001458","网络安全管理",2017,"计算机应用技术",4,3,4,01-14,56,"专业核心课","过程性考核")

-- 1711140136 添加教学任务
insert into yefh_task
	values
	(null,'1542314',1,"计算机应用技术3-3","181902","周五1-4","知行楼7-501外"),
	(null,'1215478',2,"计算机应用技术3-3","181902","周二1-4","知行楼7-503内"),
	(null,'1021545',3,"计算机应用技术3-3","181902","周三1-4","知行楼5-504外")


-- 1711140136 删除外键约束
show create table yefh_task;
-- 1711140136 yefh_task_ibfk_1
alter table yefh_task drop foreign key yefh_task_ibfk_1;

-- 1711140136 修改老师表的主键类型为int
alter table yefh_task modify te_id int(10) unsigned;
alter table yefh_te modify te_id int(10) unsigned;

-- 1711140136 还原外键约束
alter table yefh_task add 
	foreign key(te_id) references yefh_te(te_id)
	on update cascade
	on delete cascade;

-- 1711140136 给学生表定义索引——班级
create index 索引名
		on 表名（字段名）
create index stu_class
		on yefh_stu(stu_class);
show create table yefh_stu;

-- 1711140136 创建4个用户，用于限制数据库修改
CREATE USER 'selectUser'@'localhost' IDENTIFIED BY '123456';
GRANT select ON yefh_school.* TO 'selectUser'@'localhost';

CREATE USER 'updateUser'@'localhost' IDENTIFIED BY '123456';
GRANT select,update ON yefh_school.* TO 'updateUser'@'localhost';

CREATE USER 'deleteUser'@'localhost' IDENTIFIED BY '123456';
GRANT select,delete ON yefh_school.* TO 'deleteUser'@'localhost';

CREATE USER 'insertUser'@'localhost' IDENTIFIED BY '123456';
GRANT select,insert ON yefh_school.* TO 'insertUser'@'localhost';

-- 我电脑的版本创建密码为嘻哈值，所以转换一下不然登录不上
ALTER USER 'selectUser'@'localhost' IDENTIFIED WITH mysql_native_password BY '123456';

ALTER USER 'updateUser'@'localhost' IDENTIFIED WITH mysql_native_password BY '123456';

ALTER USER 'deleteUser'@'localhost' IDENTIFIED WITH mysql_native_password BY '123456';

ALTER USER 'insertUser'@'localhost' IDENTIFIED WITH mysql_native_password BY '123456';

-- 1711140136 删除用户
DROP USER 'selectUser'@'localhost';
DROP USER 'updateUser'@'localhost';
DROP USER 'deleteUser'@'localhost';
DROP USER 'insertUser'@'localhost';




-- 1711140136 清除数据
delete from yefh_dep;
delete from yefh_major;
delete from yefh_class;
delete from yefh_stu;
delete from yefh_te;


-- 1711140136 查看数据

select * from yefh_dep;
select * from yefh_major;
select * from yefh_class;
select * from yefh_stu;
select * from yefh_te;
select * from yefh_task;
select * from yefh_course;


-- 1711140136 教学查询
select * from 
yefh_te 
inner join yefh_task on (yefh_task.te_id = yefh_te.te_id)
inner join yefh_course on (yefh_course.c_id = yefh_task.c_id)
where te_name = '{$te_name}';"