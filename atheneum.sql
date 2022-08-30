
-- defaults

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

--  tables

create table student_info (
    usn varchar(10) primary key NOT NULL,
    std_name varchar(200) NOT NULL,
    std_img varchar(255) NOT NULL,
    lib_id varchar(20) NOT NULL,
    number bigint NOT NULL,
    email varchar(100) NOT NULL,
    password varchar(200) NOT NULL,
    unique key(lib_id)
);

create table userlog(
    sl_no int primary key auto_increment DEFAULT set 1,
    lib_id varchar(10),
    name varchar(20) ,
    userip varchar(200),
    LoginTime TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    LogoutTime TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    status int,foreign key(lib_id) references student_info(lib_id)
);


create table admin_info (
    admin_id varchar(10) primary key NOT NULL,
    admin_name varchar(30) NOT NULL,
    number bigint NOT NULL,
    email varchar(100) NOT NULL,
    password varchar(200) NOT NULL
);

-- insert into admin_info

insert into admin_info values(
    "admin1","Jai Shankar",9972859631,"jaishankar.cs20@bmsce.ac.in","admin1@123"
);


create table supplier (
    supplier_id varchar(10) primary key NOT NULL,
    supplier_name varchar(255) NOT NULL,
    number bigint NOT NULL,
    address varchar(255) NOT NULL,
    email varchar(200) NOT NULL
);

INSERT INTO `supplier`(`supplier_id`, `supplier_name`, `number`, `address`, `email`) VALUES ('sup01','Lakshmi Book Company','9845476254','#34 gandinagar basvangudi bangalore','lakshmi.book@gmail.com');

create table department (
    dept_id varchar(10) primary key,
    dept_name varchar(255),
    address varchar(255),
    email varchar(200)
);

-- insert into department
insert into department values
    ("cse","Computer Science & Engineering","4th Floor New Building","office.cse@bmsce.ac.in"),
    ("ise","Information Science & Engineering","5th Floor New Building","office.ise@bmsce.ac.in"),
    ("ece","Electronics & Communication Engineering","3th Floor New Building","office.ece@bmsce.ac.in"),
    ("eee","Electronics & Electrical Engineering","5th Floor PG Building","office.eee@bmsce.ac.in");



create table courses (
    course_code varchar(20) primary key,
    course_name varchar(255),
    credits int,
    drive_link varchar(255) DEFAULT NULL,
    dept_id varchar(10) ,
    foreign key(dept_id) references department(dept_id)
);

create table books (
    Bcode varchar(10) primary key,
    Bimg varchar(100),
    Bname varchar(200),
    author varchar(200),
    ed varchar(10) DEFAULT NULL,
    details LONGTEXT DEFAULT NULL,
    dept varchar(10),
    course varchar(20),
    e_link varchar(100) DEFAULT NULL,
    supplier_id varchar(10),
    quantity int
);

create table journals (
    journal_id varchar(10) primary key,
    journal_title varchar(255),
    authors varchar(255),
    pub_date TIMESTAMP NOT NULL,
    details LONGTEXT DEFAULT NULL,
    e_link varchar(100) DEFAULT NULL
);

create table question_papers(
    paper_id varchar(20),
    true_if_see bit,
    course_code varchar(20),
    foreign key(course_code) references courses(course_code)
);


create table feedback(
    lib_id varchar(20) primary key,
    feedback_details LONGTEXT DEFAULT NULL
);


create table book_issue(
    lib_id varchar(20),
    Bcode varchar(10) ,
    issue_date date ,
    return_by date ,
    renewal_count int,
    status bit,
    primary key(lib_id,Bcode),
    foreign key(lib_id) references student_info(lib_id),
    foreign key(Bcode) references books(Bcode)
);

ALTER TABLE `book_issue` CHANGE `status` `status` BIT(1) NULL DEFAULT b'0';
