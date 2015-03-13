/*Online Student Performance Monitoring System*/
/*script file*/

/*create database if not exists ospms;
use ospms;*/

/*drop table if exists registration;*/
create table registration
(
reg_id varchar(16) not null,
reg_lname varchar(30) not null,
reg_fname varchar(30) not null,
reg_mname varchar(30),
reg_gender varchar(6),
reg_status varchar(10),
reg_birthday date not null,
reg_address  varchar(150),
image varchar(100),
constraint PK_registration primary key (reg_id)
);


/*drop table if exists teacher;*/
create table teacher(

teacherID varchar(16) not null,
t_position varchar(20),

constraint PK_teacher primary key (teacherID),
constraint FK_teacher foreign key (teacherID) references registration(reg_id)
);

/*drop table if exists parent;*/
create table parent(

parentID varchar(16) not null,

constraint PK_parent primary key (parentID),
constraint FK_parent foreign key (parentID) references registration(reg_id)

);


/*drop table if exists student;*/
create table student(

student_lrn varchar(16) not null,
parentID varchar(16),

constraint PK_student primary key (student_lrn),
constraint FK1_student foreign key (student_lrn) references registration(reg_id),
constraint FK2_student foreign key (parentID) references parent(parentID)


);

/*drop table if exists admin;*/
create table admin
(
admin_id varchar(16) not null,

constraint PK_admin primary key(admin_id),
constraint FK_admin foreign key(admin_id) references registration(reg_id)
);

/*drop table if exists create_account;*/
create table create_account(

username_ varchar(16) not null,
password_ varchar(16) not null,
secret_question varchar(30),
secret_answer varchar(30),
user_type varchar(10),
account_id VARCHAR(16) not null,
constraint PK_create_user primary key (username_),
constraint FK_create_user foreign key (account_id) references registration(reg_id)

);


/*drop table if exists rating;*/
create table rating(

legendID varchar(2) not null,
description varchar(25),
equivalent varchar(25),
constraint PK_rating primary key (legendID)
);



/*drop table if exists grade_level;*/
create table grade_level(

levelID varchar(5) not null,
level_description varchar(10),
constraint PK_grade_level primary key (levelID)
);

/*drop table if exists subject_;*/
create table subject_(

subjectID varchar(8) not null,
subject_title varchar(30),
constraint PK_subject primary key (subjectID)

);

/*drop table if exists room;*/
create table room(

roomNo varchar(10),
building varchar(30),
seat_capacity varchar(3),

constraint PK_room primary key (roomNo)

);

/*drop table if exists section_list;*/
create table section_list(

sectionID varchar(6),
sectionNo varchar(2),
section_name varchar(20),
level_id varchar(5) not null,

constraint PK_section_list primary key (sectionID),
constraint FK_section_list foreign key (level_id) references grade_level(levelID)
);

/*drop table if exists section;*/
create table section(

class_rec_no varchar(10) not null,
sectionID varchar(6),
sched_days varchar(9),
sched_start_time time,
sched_end_time time,
subjectID varchar(8),
teacherID varchar(16),
levelID varchar(5),
roomNo varchar(10),
school_year varchar(9),

constraint PK_section primary key (class_rec_no),
constraint FK_section2 foreign key (sectionID) references section_list(sectionID),
constraint FK_section3 foreign key (teacherID) references teacher(teacherID),
constraint FK_section4 foreign key (subjectID) references subject_(subjectID),
constraint FK_section5 foreign key (levelID) references grade_level(levelID),
constraint FK_section6 foreign key (roomNo) references room(roomNo)

);


/*drop table if exists student_schedule_line;*/
create table student_schedule_line(

class_rec_no varchar(10) not null,
student_lrn varchar(16) not null,
grade varchar(8),

constraint PK_student_schedule_line primary key (class_rec_no,student_lrn),
constraint FK1_student_schedule_line foreign key (class_rec_no) references section(class_rec_no),
constraint FK2_student_schedule_line foreign key (student_lrn) references student(student_lrn)
);


/*drop table if exists ol_exercise_type;*/
/*create table ol_exercise_type(

typeID  varchar(8) not null,
type_desc varchar(20) not null,
constraint PK_ol_exer_type primary key (typeID)

);
*/

/*drop table if exists create_ol_exercise;*/
/*create table create_ol_exercise(
exerciseID int not null auto_increment,
typeID varchar(8) not null,
exerciseName varchar(25) not null,
date_created datetime not null,
constraint PK_exerciseID primary key(exerciseID),
constraint FK_exerciseID foreign key(typeID) references ol_exercise_type(typeID)
);
*/

/*drop table if exists create_questions;*/
/*create table create_questions(

questionNo int not null auto_increment,
exerciseID int null,
oe_question varchar(255) not null,
oe_correct varchar(255) not null,
date_created datetime not null,
constraint PK_create_questions primary key(questionNo),
constraint FK_create_questions foreign key(exerciseID) references create_ol_exercise(exerciseID)
);
*/


/*drop table if exists oe_choices;*/
/*create table oe_choices(
questionNo int not null,
oe_choices varchar(255) not null,
date_created datetime not null,
constraint PK_oe_choice primary key(questionNo, oe_choices),
constraint FK_oe_choice foreign key(questionNo) references create_questions(questionNo)
);
*/

/*drop table if exists post_ol_exer;*/
/*create table post_ol_exer(

class_rec_no varchar(10) not null,
exerciseID int not null,


constraint PK_post_oe primary key(class_rec_no,exerciseID),
constraint FK1_post_oe foreign key(exerciseID) references create_ol_exercise(exerciseID),
constraint FK2_post_oe foreign key (class_rec_no) references section(class_rec_no)

);
*/

/*
drop table if exists write_announcement;
create table write_announcement
(
  teacherID varchar(16) not null,
  class_rec_no varchar(10) not null,
  date_created datetime not null,
  message varchar(255) not null,
  constraint PK_write_ann primary key (teacherID, class_rec_no, date_created),
  constraint FK1_write_ann foreign key (teacherID) references teacher(teacherID),
  constraint Fk2_write_ann foreign key (class_rec_no) references section(class_rec_no)

);

drop table if exists post_lecture;
create table post_lecture
(
  teacherID varchar(16) not null,
  class_rec_no varchar(10) not null,
  date_created datetime not null,
  file_caption varchar(200) not null,
  file_path varchar(200) not null,
  file_name varchar(100) not null,
  constraint PK_post_lecture primary key (teacherID, class_rec_no, date_created),
  constraint FK1_post_lecture foreign key (teacherID) references teacher(teacherID),
  constraint FK2_post_lecture foreign key (class_rec_no) references section(class_rec_no)


);
*/

/*drop table if exists announcement_lecture;*/
create table announcement_lecture
(
date_created datetime not null,
messageorfile_caption longtext null,
file_path varchar(200) null,
file_name varchar(100) null,

constraint PK_announcement_lecture primary key (date_created)
);

/*drop table if exists announcement_lecture_comments;*/
create table announcement_lecture_comments
(
comment_date_created datetime not null,
account_id varchar(16) not null,
comment_message longtext null,
post_date_created datetime not null,

constraint PK_announcement_lecture_comments primary key (comment_date_created,account_id),
constraint FK1_announcement_lecture_comments foreign key (post_date_created) references announcement_lecture(date_created),
constraint FK2_announcement_lecture_comments foreign key (account_id) references registration(reg_id)
);

/*drop table if exists post_announcement_lecture;*/
create table post_announcement_lecture
(
class_rec_no varchar(10) not null,
date_created datetime not null,

constraint PK_post_announcement_lecture primary key (class_rec_no,date_created),
constraint FK1_post_announcement_lecture foreign key (class_rec_no) references section(class_rec_no),
constraint FK2_post_announcement_lecture foreign key (date_created) references announcement_lecture(date_created)
);

/*drop table if exists teacher_feedback_parent;*/
create table teacher_feedback_parent
(
feedback_date_created datetime not null,
feedback_message longtext null,

constraint PK_teacher_feedback_parent primary key (feedback_date_created)

);

create table teacher_feedback_parent_comments
(
feedback_comment_date_created datetime not null,
feedback_account_id varchar(16) not null,
feedback_comment_message longtext null,
feedback_post_date_created datetime not null,

constraint PK_teacher_feedback_parent_comments primary key (feedback_comment_date_created,feedback_account_id),
constraint FK1_teacher_feedback_parent_comments foreign key (feedback_post_date_created) references teacher_feedback_parent(feedback_date_created),
constraint FK2_teacher_feedback_parent_comments foreign key (feedback_account_id) references registration(reg_id)
);

/*drop table if exists post_teacher_feedback_parent;*/
create table post_teacher_feedback_parent
(
class_rec_no varchar(10) not null,
feedback_date_created datetime not null,
parentID varchar(16) not null,

constraint PK_post_teacher_feedback_parent primary key (class_rec_no,feedback_date_created,parentID),
constraint FK1_post_teacher_feedback_parent foreign key (class_rec_no) references section(class_rec_no),
constraint FK2_post_teacher_feedback_parent foreign key (feedback_date_created) references teacher_feedback_parent(feedback_date_created),
constraint FK3_post_teacher_feedback_parent foreign key (parentID) references parent(parentID)
);

/*DROP TABLE IF EXISTS `grading`;
CREATE TABLE `grading` (
  `student_lrn` varchar(16) CHARACTER SET utf8 NOT NULL,
  `grading_period` varchar(3) NOT NULL,
  `week_number` int(3) NOT NULL,
  `k_quizzes` double NOT NULL,
  `k_recitation` double NOT NULL,
  `k_raw_score` double NOT NULL,
  `ps_quizzes` double NOT NULL,
  `ps_recitation` double NOT NULL,
  `ps_raw_score` double NOT NULL,
  `u_quizzes` double NOT NULL,
  `u_recitation` double NOT NULL,
  `u_open_ended_q` double NOT NULL,
  `pp_group_work` double NOT NULL,
  `pp_project` double NOT NULL,
  `pp_homework` double NOT NULL,
  `pp_others` double NOT NULL,
  `tentative_grade` double NOT NULL,
  `legend` varchar(2) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
*/
/*drop table if exists student_rating;*/
create table student_rating
(
grading_id varchar(10) character set utf8 not null,
student_lrn varchar(16) character set utf8 not null,
class_rec_no varchar(10) not null,
grading_period varchar(3) NOT NULL,
week_number int(3) not null,
knowledge double not null,
processskills double not null,
understanding double not null,
performanceproducts double not null,
tentative_grade double not null,
legend varchar(2) CHARACTER SET utf8 DEFAULT NULL,


constraint PK_student_rating primary key (grading_id,student_lrn,class_rec_no),
constraint FK1_student_rating foreign key (student_lrn) references student(student_lrn),
constraint FK2_student_rating foreign key (legend) references rating(legendID),
constraint FK3_student_rating foreign key (class_rec_no) references section(class_rec_no)

);

create table curr_section_list
(
section_name varchar(20),
grade_level varchar(10)

);

create table curr_subject_list
(
subject_name varchar(30)
);

