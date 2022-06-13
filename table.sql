--DROP TABLE
DROP TABLE ANIMAL;
DROP TABLE CAGE;
DROP TABLE MUSEUM;
DROP TABLE LOOK_AFTER;
DROP TABLE TAKE_CARE;
DROP TABLE ANIMAL_DIET;
DROP TABLE EMPLOYEE ;
DROP TABLE INCOME ;
DROP TABLE TAXONOMY ;
Drop TABLE Visitor_Info;
Drop TABLE VisitorInfo_PhoneNo;
Drop TABLE Visitor_visitingDates;
Drop TABLE Complaints;
Drop TABLE Visitor_Complaints;
Drop TABLE Ticket_info;
Drop TABLE Employee_Complaints;
Drop TABLE ComplaintsAboutCage;
DROP TABLE FOOD;
DROP TABLE PROVIDES;
DROP TABLE SUPPLIER_FOOD;
DROP TABLE FOOD_SUPPLIER_PHONE_NUMBER;
DROP TABLE FOOD_SUPPLIER;
DROP TABLE FOOD_COST;
DROP TABLE RESEARCH_WORK;
DROP TABLE RESEARCH_ON_ANIMAL;
DROP TABLE RESEARCH_ON_MUSEUM;
DROP TABLE ZOO_INFO;
DROP TABLE VACCINE;
DROP TABLE EXPENDITURE ;


--****** CREATE TABLE

CREATE TABLE ZOO_INFO(
    ZOO_NAME VARCHAR2(40),
    OPEN_STATUS VARCHAR2(20),
    VISITING_TIME VARCHAR2(20)
);

CREATE TABLE VACCINE (
    VACCINE_ID VARCHAR2(20),
    VACCINE_NAME VARCHAR2(20),
    ARRIVAL_DATE DATE,
    VACCINE_TYPE VARCHAR2(20),
    ENVIRONMENT_TYPE VARCHAR2(20),
    CURE_DISEASES VARCHAR2(20),
    EXPIARY_DATE DATE,
    PRODUCTION_DATE DATE,
    CONSTRAINT VACCINE_ID_PK PRIMARY KEY(VACCINE_ID)
);

CREATE TABLE EXPENDITURE(
    TRX_EXP_ID VARCHAR2(20),
    EXPENSE_DATE DATE,
    AMOUNT NUMBER,
    CONSTRAINT TRX_EXP_ID_PK PRIMARY KEY(TRX_EXP_ID)
);

CREATE TABLE EMPLOYEE (
    EMPLOYEE_ID VARCHAR2(20),
    EMPLOYEE_NAME VARCHAR2(20) NOT NULL,
    EMPLOYEE_TYPE VARCHAR2(20) NOT NULL,
    EMPLOYEE_SALARY NUMBER(20) CHECK( EMPLOYEE_SALARY>0),
    JOINING_DATE DATE NOT NULL,
    DESIGNATION VARCHAR2(20) NOT NULL,
    GENDER VARCHAR2(10) NOT NULL,
    DOB DATE NOT NULL,
    DURATION_OF_JOB VARCHAR2(20) ,
    EMPLOYEE_AGE NUMBER(3,0) NOT NULL , 
    constraint EMPLOYEE_EMPLOYEE_ID_pk primary key(EMPLOYEE_ID)
);

CREATE TABLE INCOME(
    TAX_INCOME_ID VARCHAR2(20),
    SOURCE VARCHAR2(20) NOT NULL,
    INCOME_DATE DATE NOT NULL,
    AMOUNT NUMBER(25,5) ,
    constraint INCOME_TAX_INCOME_ID_pk primary key(TAX_INCOME_ID) 
);

CREATE TABLE TAXONOMY(
    GENUS VARCHAR2(20) NOT NULL,
    SPECIES VARCHAR2(20),
    KINGDOM VARCHAR2(20) NOT NULL,
    PHYLUM VARCHAR2(20) NOT NULL,
    T_CLASS VARCHAR2(20) NOT NULL,
    FAMILY VARCHAR2(20) NOT NULL,
    T_ORDER VARCHAR2(20) NOT NULL,
	constraint TAXONOMY_GENUS_Uk  UNIQUE(GENUS),
	constraint TAXONOMY_SPECIES_pk primary key(SPECIES) 
);


CREATE TABLE EMPLOYEE_PHONE(
    EMPLOYEE_ID VARCHAR2(20),
    PHONE_NO NUMBER(11),
    CONSTRAINT EMPLOYEE_PHONE_EMPLOYEE_ID_fk FOREIGN KEY(EMPLOYEE_ID) REFERENCES EMPLOYEE(EMPLOYEE_ID)
);

CREATE TABLE CAGE(
	CAGE_NO NUMBER(3,0) ,
	CAGE_LOCATION VARCHAR2(20) NOT NULL,
	MAX_CAPACITY NUMBER(4,0),
	CLEANING_INTERVAL NUMBER(3,0) NOT NULL,
  	CAGE_HEIGHT NUMBER(5,0), 
  	CAGE_WEIGHT NUMBER(5,0), 
  	CAGE_LENGTH NUMBER(5,0),
  	CLEAN_STATUS VARCHAR2(10), 
  	LAST_CLEANING_DATE DATE, 
	CONSTRAINT CAGE_CAGE_NO_PK PRIMARY KEY(CAGE_NO)
);
CREATE TABLE MUSEUM(
	SPECIMEN_ID VARCHAR2(20) NOT NULL,
	CATEGORY VARCHAR2(20),
	SPECIES VARCHAR2(20) UNIQUE,
	TOTAL_COUNT NUMBER(4,0), 
	COLLECTION_DATE DATE, 
	PRESERVATION_CHEMICAL VARCHAR2(20), 
	EMPLOYEE_ID VARCHAR2(20),
	CONSTRAINT MUSEUM_SPECIMEN_ID_PK PRIMARY KEY(SPECIMEN_ID),
	CONSTRAINT MUSEUM_EMPLOYEE_ID_FK FOREIGN KEY(EMPLOYEE_ID) REFERENCES EMPLOYEE_INFO(EMPLOYEE_ID) ON DELETE CASCADE

);
CREATE TABLE ANIMAL(
	ANIMAL_ID VARCHAR2(20) NOT NULL,
	ANIMAL_NAME VARCHAR2(20) NOT NULL,
	NICKNAME VARCHAR2(20),
	AGE NUMBER(3,0),
	GENDER VARCHAR2(20) NOT NULL,
	CURRENT_CONDITION VARCHAR2(40),
	CATEGORY VARCHAR2(20),
    ARRIVAL_PLACE VARCHAR2(20),
	ARRIVAL_DATE DATE,
	BREEDING_STATUS VARCHAR2(30),
	ENDANGERED_STATUS VARCHAR2(20) NOT NULL,
	ENVIRONMENT VARCHAR2(40),
	CAGE_NO NUMBER(4,0) NOT NULL UNIQUE,
	PREVIOUS_AFFECTED_DISEASES VARCHAR2(60),
	PRICE NUMBER (20,0),
	LIFESPAN VARCHAR2(20) NOT NULL,
	SPECIAL_DIMENSION VARCHAR2(30),
	HEIGHT NUMBER(3,0),
	WEIGHT NUMBER(5,0),
	DEATH VARCHAR2(20),
	CAUSE VARCHAR2(20),
	CAGE_NO NUMBER(3,0),
	GENUS VARCHAR2(20),
	SPECIES VARCHAR2(20),
	CONSTRAINT ANIMAL_ANIMAL_ID_PK PRIMARY KEY(ANIMAL_ID),
	CONSTRAINT ANIMAL_CAGE_NO_FK FOREIGN KEY(CAGE_NO) REFERENCES CAGE(CAGE_NO) ON DELETE CASCADE,
	CONSTRAINT ANIMAL_GENUS_FK FOREIGN KEY(GENUS) REFERENCES TAXONOMY(GENUS) ON DELETE CASCADE,
	CONSTRAINT ANIMAL_SPECIES_FK FOREIGN KEY(SPECIES) REFERENCES TAXONOMY(SPECIES) ON DELETE CASCADE
);

CREATE TABLE FOOD
(
	FOOD_NAME VARCHAR2(20) ,
	FOOD_QUANTITY NUMBER(20),
	FOOD_TYPE VARCHAR2(20),
	FOOD_EXPDATE DATE,
	constraint FOOD_FOOD_NAME_pk primary key(FOOD_NAME)
);

CREATE TABLE PROVIDES(
	FOOD_NAME VARCHAR2(20)  ,
	EMPLOYEE_ID VARCHAR2(20)  ,
    constraint PROVIDES_FOOD_NAME_FK FOREIGN KEY(FOOD_NAME) REFERENCES FOOD(FOOD_NAME)on delete cascade,
    constraint PROVIDES_EMPLOYEE_ID_FK FOREIGN KEY(EMPLOYEE_ID) REFERENCES EMPLOYEE_INFO(EMPLOYEE_ID)on delete cascade
);

CREATE TABLE FOOD_SUPPLIER
(
	FOOD_SUPPLIER_ID VARCHAR2(20)  ,
	FOOD_SUPPLIER_NAME VARCHAR2(20),
	DATE_OF_SUPPLY DATE,
	FOOD_SUPPLIED VARCHAR2(20),
	FOOD_PRICE NUMBER(20),
	FOOD_SOURCE VARCHAR2(20),
    FOOD_AMOUNT NUMBER(20),
	constraint FOOD_SUPPLIER_FOOD_SUPPLIER_ID_pk primary key(FOOD_SUPPLIER_ID)
);

CREATE TABLE FOOD_SUPPLIER_PHONE_NUMBER
(
	FOOD_SUPPLIER_ID VARCHAR2(20)  ,
    FOOD_SUPPLIER_PHONE_NO NUMBER(20),
    constraint FOOD_SUPPLIER_PHONE_NUMBER_FOOD_SUPPLIER_ID_FK FOREIGN KEY(FOOD_SUPPLIER_ID) REFERENCES FOOD_SUPPLIER(FOOD_SUPPLIER_ID)on delete cascade

);

CREATE TABLE SUPPLIED_FOOD
(
	FOOD_NAME VARCHAR2(20)  ,
	FOOD_SUPPLIER_ID VARCHAR2(20)  ,
    constraint SUPPLIED_FOOD_NAME_FK FOREIGN KEY(FOOD_NAME) REFERENCES FOOD(FOOD_NAME)on delete cascade,
    constraint SUPPLIED_FOOD_FOOD_SUPPLIER_ID_FK FOREIGN KEY(FOOD_SUPPLIER_ID) REFERENCES FOOD_SUPPLIER(FOOD_SUPPLIER_ID)on delete cascade

);

CREATE TABLE FOOD_COST
(
	TRX_EXP_ID VARCHAR2(20) ,
	FOOD_SUPPLIER_ID VARCHAR2(20) ,
    constraint FOOD_COST_TRX_EXP_ID_FK FOREIGN KEY(TRX_EXP_ID) REFERENCES SALARY_COST(TRX_EXP_ID)on delete cascade,
    constraint FOOD_COST_FOOD_SUPPLIER_ID_FK FOREIGN KEY(FOOD_SUPPLIER_ID) REFERENCES FOOD_SUPPLIER(FOOD_SUPPLIER_ID)on delete cascade	 
);

CREATE TABLE RESEARCH_WORK
(
	PAPERLINK VARCHAR2(100)  ,
	RESEARCHER_NAME VARCHAR2(20),
    RESEARCHER_MAIL VARCHAR2(20),
    RESEARCHER_PHONE_NO NUMBER(20),
	RESEARCH_TOPIC VARCHAR2(50),
	RESEARCH_INST VARCHAR2(20),
	constraint RESEARCH_WORK_PAPERLINK_pk primary key(PAPERLINK)
);

CREATE TABLE RESEARCH_ON_ANIMAL
(
	ANIMAL_ID VARCHAR2(20)  ,
	PAPERLINK VARCHAR2(100)  ,
    constraint RESEARCH_ON_ANIMAL_PAPERLINK_FK FOREIGN KEY(PAPERLINK) REFERENCES RESEARCH_WORK(PAPERLINK)on delete cascade,
    constraint RESEARCH_ON_ANIMAL_ANIMAL_ID_FK FOREIGN KEY(ANIMAL_ID) REFERENCES ANIMAL(ANIMAL_ID)on delete cascade
);

CREATE TABLE RESEARCH_ON_MUSEUM
(
	SPECIMEN_ID VARCHAR2(20)  ,
	PAPERLINK VARCHAR2(100) ,
    constraint RESEARCH_ON_MUSEUM_PAPERLINK_FK FOREIGN KEY(PAPERLINK) REFERENCES RESEARCH_WORK(PAPERLINK)on delete cascade,
    constraint RESEARCH_ON_MUSEUM_SPECIMEN_ID_FK FOREIGN KEY(SPECIMEN_ID) REFERENCES MUSEUM(SPECIMEN_ID)on delete cascade
);

CREATE TABLE ANIMAL_DIET 
(
    FOOD_NAME VARCHAR2(20),
	ANIMAL_ID VARCHAR2(20),
	PROVIDED_QUANTITY VARCHAR2(30),
	CONSTRAINT ANIMAL_DIET_FOOD_NAME_FK FOREIGN KEY(FOOD_NAME) REFERENCES FOOD(FOOD_NAME) ON DELETE CASCADE,
	CONSTRAINT ANIMAL_DIET_ANIMAL_ID_FK FOREIGN KEY(ANIMAL_ID) REFERENCES ANIMAL(ANIMAL_ID) ON DELETE CASCADE

);
CREATE TABLE LOOK_AFTER
(
    CAGE_NO NUMBER(3,0) NOT NULL,
	EMPLOYEE_ID VARCHAR2(20),
	CONSTRAINT LOOK_AFTER_CAGE_NO_FK FOREIGN KEY(CAGE_NO) REFERENCES CAGE(CAGE_NO) ON DELETE CASCADE,
	CONSTRAINT LOOK_AFTER_EMPLOYEE_ID_FK FOREIGN KEY(EMPLOYEE_ID) REFERENCES EMPLOYEE_INFO(EMPLOYEE_ID) ON DELETE CASCADE

);
CREATE TABLE TAKE_CARE
(
    ANIMAL_ID VARCHAR2(20) NOT NULL,
	EMPLOYEE_ID VARCHAR2(20),
	CONSTRAINT TAKE_CARE_ANIMAL_ID_FK FOREIGN KEY(ANIMAL_ID) REFERENCES ANIMAL(ANIMAL_ID) ON DELETE CASCADE,
	CONSTRAINT TAKE_CARE_EMPLOYEE_ID_FK FOREIGN KEY(EMPLOYEE_ID) REFERENCES EMPLOYEE_INFO(EMPLOYEE_ID) ON DELETE CASCADE;
);

CREATE TABLE Visitor_Info
(
	Register_id VARCHAR2(20) PRIMARY KEY,
	visitor_Name VARCHAR2(40) ,
	visitor_Gender VARCHAR2(10),
	Visitor_Email VARCHAR2(40),
	Visitor_DOB VARCHAR2(15),
    Visitor_Age NUMBER (5,0) CHECK (Visitor_Age>0),
    Visitor_Password VARCHAR2(30) NOT NULL ,
    Total_Visits NUMBER (10,0) CHECK (Total_visits>=0),
    CONSTRAINT Visitor_Info_Visitor_Password_uk UNIQUE(Visitor_Password)
); 

CREATE TABLE VisitorInfo_PhoneNo
(
	Visitor_PhoneNo VARCHAR2(15) NOT NULL,
	Register_id VARCHAR2(20),
	CONSTRAINT VisitorInfo_PhoneNo_Register_id_fk FOREIGN KEY (Register_id) REFERENCES Visitor_Info(Register_id) ON DELETE CASCADE
);

CREATE TABLE Visitor_visitingDates
(
	Visiting_Dates Date,
	Register_id VARCHAR2(20),
	CONSTRAINT Visitor_visitingDates_Register_id_fk FOREIGN KEY (Register_id) REFERENCES Visitor_Info(Register_id) ON DELETE CASCADE
);

CREATE TABLE Complaints
(
	Complaint_no VARCHAR2(20) PRIMARY KEY,
	Compliant_date Date,
	Complaint_type VARCHAR2(20),
	Complian_details VARCHAR2(50)
);

CREATE TABLE Visitor_Complaints
(
	Complaint_no VARCHAR2(20),
	Register_id VARCHAR2(20),
	CONSTRAINT Visitor_Complaints_Complaint_no_fk FOREIGN KEY (Complaint_no) REFERENCES Complaints(Complaint_no) ON DELETE CASCADE,
	CONSTRAINT Visitor_Complaints_Register_id_fk FOREIGN KEY (Register_id) REFERENCES Visitor_Info(Register_id) ON DELETE CASCADE
);

CREATE TABLE Ticket_info
(
	Ticket_id VARCHAR2(20) PRIMARY KEY,
	Ticket_type VARCHAR2(20),
	Buying_date Date,
	Buying_Time VARCHAR2(10),
	Ticket_Price NUMBER (15,0) CHECK (Ticket_Price>=0),
	Register_id VARCHAR2(20),
	CONSTRAINT Ticket_info_Register_id_fk FOREIGN KEY (Register_id) REFERENCES Visitor_Info(Register_id) ON DELETE CASCADE
);

CREATE TABLE Employee_Complaints
(
	Complaint_no VARCHAR2(20),
	EMPLOYEE_ID VARCHAR2(20),
	CONSTRAINT Employee_Complaints_Complaint_no_fk FOREIGN KEY (Complaint_no) REFERENCES Complaints(Complaint_no) ON DELETE CASCADE,
	CONSTRAINT Employee_Complaints_EMPLOYEE_ID_fk FOREIGN KEY (Employee_id) REFERENCES EMPLOYEE_INFO(EMPLOYEE_ID) ON DELETE CASCADE
);

CREATE TABLE ComplaintsAboutCage
(
	Complaint_no VARCHAR2(20),
	CAGE_NO VARCHAR2(20),
	CONSTRAINT ComplaintsAboutCage_Complaint_no_fk FOREIGN KEY (Complaint_no) REFERENCES Complaints(Complaint_no) ON DELETE CASCADE,
	CONSTRAINT ComplaintsAboutCage_Cage_no_fk FOREIGN KEY (CAGE_NO) REFERENCES CAGE(CAGE_NO) ON DELETE CASCADE
);











--************ INSERTION

INSERT INTO ZOO_INFO ( ZOO_NAME, OPEN_STATUS , VISITING_TIME) 
VALUES ('National_Zoo','Yes/No', '8:00am-8:00pm'); --to_date('12-JUN-2022','DD-MM-YYYY')


INSERT INTO VACCINE (VACCINE_ID, VACCINE_NAME, ARRIVAL_DATE, VACCINE_TYPE, ENVIRONMENT_TYPE, CURE_DISEASES, EXPIARY_DATE, PRODUCTION_DATE)
VALUES ('V000001', 'VACCINE-1', to_date('15-JUN-2022','DD-MM-YYYY'),'FIRST DOSE','COLD', 'AKABANE', to_date('12-JUN-2024','DD-MM-YYYY'),to_date('12-JUN-2022','DD-MM-YYYY'));
INSERT INTO VACCINE (VACCINE_ID, VACCINE_NAME, ARRIVAL_DATE, VACCINE_TYPE, ENVIRONMENT_TYPE, CURE_DISEASES, EXPIARY_DATE, PRODUCTION_DATE)
VALUES ('V000002', 'VACCINE-2', to_date('16-JUN-2022','DD-MM-YYYY'),'2ND DOSE','COLD', 'ANTHRAX', to_date('12-JUN-2024','DD-MM-YYYY'),to_date('12-JUN-2022','DD-MM-YYYY'));
INSERT INTO VACCINE (VACCINE_ID, VACCINE_NAME, ARRIVAL_DATE, VACCINE_TYPE, ENVIRONMENT_TYPE, CURE_DISEASES, EXPIARY_DATE, PRODUCTION_DATE)
VALUES ('V000003', 'VACCINE-3', to_date('14-JUN-2022','DD-MM-YYYY'),'FIRST DOSE','COLD', 'COCCIDIOSIS', to_date('12-JUN-2024','DD-MM-YYYY'),to_date('12-JUN-2022','DD-MM-YYYY'));
INSERT INTO VACCINE (VACCINE_ID, VACCINE_NAME, ARRIVAL_DATE, VACCINE_TYPE, ENVIRONMENT_TYPE, CURE_DISEASES, EXPIARY_DATE, PRODUCTION_DATE)
VALUES ('V000004', 'VACCINE-4', to_date('16-JUN-2022','DD-MM-YYYY'),'THIRD DOSE','COLD', 'BOTULISM', to_date('12-JUN-2024','DD-MM-YYYY'),to_date('12-JUN-2022','DD-MM-YYYY'));
INSERT INTO VACCINE (VACCINE_ID, VACCINE_NAME, ARRIVAL_DATE, VACCINE_TYPE, ENVIRONMENT_TYPE, CURE_DISEASES, EXPIARY_DATE, PRODUCTION_DATE)
VALUES ('V000005', 'VACCINE-5', to_date('15-JUN-2022','DD-MM-YYYY'),'BOOSTER DOSE','COLD', 'FOWL POX', to_date('12-JUN-2024','DD-MM-YYYY'),to_date('12-JUN-2022','DD-MM-YYYY'));


INSERT INTO EXPENDITURE (TRX_EXP_ID, EXPENSE_DATE, AMOUNT)
VALUES ('TRXID00001', to_date('12-06-2022','DD-MM-YYYY'), 20000);
INSERT INTO EXPENDITURE (TRX_EXP_ID, EXPENSE_DATE, AMOUNT)
VALUES ('TRXID00002', to_date('13-06-2022','DD-MM-YYYY'), 25000);
INSERT INTO EXPENDITURE (TRX_EXP_ID, EXPENSE_DATE, AMOUNT)
VALUES ('TRXID00003', to_date('11-06-2022','DD-MM-YYYY'), 40000);
INSERT INTO EXPENDITURE (TRX_EXP_ID, EXPENSE_DATE, AMOUNT)
VALUES ('TRXID00004', to_date('10-06-2022','DD-MM-YYYY'), 50000);
INSERT INTO EXPENDITURE (TRX_EXP_ID, EXPENSE_DATE, AMOUNT)
VALUES ('TRXID00005', to_date('14-06-2022','DD-MM-YYYY'), 15000);


INSERT INTO EMPLOYEE (EMPLOYEE_ID,EMPLOYEE_NAME,EMPLOYEE_TYPE,EMPLOYEE_SALARY,JOINING_DATE,DESIGNATION,GENDER,DOB,DURATION_OF_JOB,EMPLOYEE_AGE) 
VALUES ( 'E_ID00001','Hubert' , 'zoo cleaner','533866.82' ,to_date('24-06-2020','DD-MM-YYYY') ,'Class D' ,'MALE' ,to_date('24-06-2020','DD-MM-YYYY')  , '2 Years','43' );
INSERT INTO EMPLOYEE (EMPLOYEE_ID,EMPLOYEE_NAME,EMPLOYEE_TYPE,EMPLOYEE_SALARY,JOINING_DATE,DESIGNATION,GENDER,DOB,DURATION_OF_JOB,EMPLOYEE_AGE) 
VALUES ( 'E_ID00002','Novelia' ,'food manager' ,'533866.82'  ,to_date('24-10-2017','DD-MM-YYYY') , 'Class C' ,'MALE' , to_date('24-10-2017','DD-MM-YYYY') , '2 Years' ,'43' );
INSERT INTO EMPLOYEE (EMPLOYEE_ID,EMPLOYEE_NAME,EMPLOYEE_TYPE,EMPLOYEE_SALARY,JOINING_DATE,DESIGNATION,GENDER,DOB,DURATION_OF_JOB,EMPLOYEE_AGE) 
VALUES ('E_ID00003'  ,'Willdon' ,'officer A' ,'2121354.42' ,to_date('28-10-2021','DD-MM-YYYY') ,'Class A' ,'MALE' ,to_date('28-10-2021','DD-MM-YYYY') , '2 Years' ,'43');
INSERT INTO EMPLOYEE (EMPLOYEE_ID,EMPLOYEE_NAME,EMPLOYEE_TYPE,EMPLOYEE_SALARY,JOINING_DATE,DESIGNATION,GENDER,DOB,DURATION_OF_JOB,EMPLOYEE_AGE) 
VALUES ( 'E_ID00004' , 'Tandy','cage cleaner' ,'1868578.01' ,to_date('13-06-2013','DD-MM-YYYY') ,'Class B' ,'MALE' ,to_date('13-06-2013','DD-MM-YYYY') , '2 Years' ,'43');
INSERT INTO EMPLOYEE (EMPLOYEE_ID,EMPLOYEE_NAME,EMPLOYEE_TYPE,EMPLOYEE_SALARY,JOINING_DATE,DESIGNATION,GENDER,DOB,DURATION_OF_JOB,EMPLOYEE_AGE) 
VALUES ( 'E_ID00005' ,'Ravi' , 'doctor','176116.52' ,to_date('20-06-2019','DD-MM-YYYY') , 'Class B','MALE' ,to_date('20-06-2019','DD-MM-YYYY')  ,  '2 Years','43');


INSERT INTO INCOME (TAX_INCOME_ID,SOURCE,INCOME_DATE,AMOUNT) 
VALUES ( 'INC_ID00001', 'gov donation',to_date('24-06-2020','DD-MM-YYYY'),533866.82 );
INSERT INTO INCOME (TAX_INCOME_ID,SOURCE,INCOME_DATE,AMOUNT) 
VALUES ( 'INC_ID00002', 'ticket' ,to_date('24-10-2017','DD-MM-YYYY'),533866.82 );
INSERT INTO INCOME (TAX_INCOME_ID,SOURCE,INCOME_DATE,AMOUNT) 
VALUES ( 'INC_ID00003' , 'ticket' , to_date('28-10-2021','DD-MM-YYYY'),212135442);
INSERT INTO INCOME (TAX_INCOME_ID,SOURCE,INCOME_DATE,AMOUNT) 
VALUES ( 'INC_ID00004' , 'gov donation' ,to_date('13-06-2013','DD-MM-YYYY'),1868578.01 );
INSERT INTO INCOME (TAX_INCOME_ID,SOURCE,INCOME_DATE,AMOUNT) 
VALUES ( 'INC_ID00005' , 'private donation' ,to_date('20-06-2019','DD-MM-YYYY' ),176116.52);


INSERT INTO TAXONOMY (GENUS,SPECIES,KINGDOM,PHYLUM,T_CLASS,FAMILY,T_ORDER) 
VALUES ( 'Macaca','Paradoxurus ' , 'Animalia','Chordate' ,'Annelida' ,'Hominidae' ,'Boreoeutheria' );
INSERT INTO TAXONOMY (GENUS,SPECIES,KINGDOM,PHYLUM,T_CLASS,FAMILY,T_ORDER) 
VALUES ( 'Milvago','hermaphroditus' ,'Animalia ', 'Arthropod','Annelida' ,'Hominidae' ,'Boreoeutheria' );
INSERT INTO TAXONOMY (GENUS,SPECIES,KINGDOM,PHYLUM,T_CLASS,FAMILY,T_ORDER) 
VALUES ('Dacelo' ,'novaeguineae' ,'Animalia' ,'Chordate' ,'Annelida' ,'Hominidae' ,'Boreoeutheria' );
INSERT INTO TAXONOMY (GENUS,SPECIES,KINGDOM,PHYLUM,T_CLASS,FAMILY,T_ORDER) 
VALUES ('Cordylus ' ,'giganteus' ,'Animalia' ,'Basidiomycota' , 'Annelida','Hominidae' , 'Boreoeutheria');
INSERT INTO TAXONOMY (GENUS,SPECIES,KINGDOM,PHYLUM,T_CLASS,FAMILY,T_ORDER) 
VALUES ('Lasiorhinus' ,' latifrons' ,'Animalia' , 'Pseudomonadota','Annelida' ,'Hominidae' , 'Boreoeutheria');





--*********** QUERY





-- INSERT 
INSERT INTO CAGE
(CAGE_NO,CAGE_LOCATION,MAX_CAPACITY,CLEANING_INTERVAL,CAGE_HEIGHT,CAGE_WEIGHT,CAGE_LENGTH,CLEAN_STATUS,LAST_CLEANING_DATE) VALUES (10,'EAST-1',5,3,20,30,60,'clean',to_date('12-JUN-2022','DD-MM-YYYY'));
INSERT INTO CAGE
(CAGE_NO,CAGE_LOCATION,MAX_CAPACITY,CLEANING_INTERVAL,CAGE_HEIGHT,CAGE_WEIGHT,CAGE_LENGTH,CLEAN_STATUS,LAST_CLEANING_DATE) VALUES (20,'EAST-2',6,3,30,30,40,'not clean',to_date('13-JUN-2022','DD-MM-YYYY'));
INSERT INTO CAGE
(CAGE_NO,CAGE_LOCATION,MAX_CAPACITY,CLEANING_INTERVAL,CAGE_HEIGHT,CAGE_WEIGHT,CAGE_LENGTH,CLEAN_STATUS,LAST_CLEANING_DATE) VALUES (30,'EAST-3',7,4,40,40,60,'clean',to_date('14-JUN-2022','DD-MM-YYYY'));
INSERT INTO CAGE
(CAGE_NO,CAGE_LOCATION,MAX_CAPACITY,CLEANING_INTERVAL,CAGE_HEIGHT,CAGE_WEIGHT,CAGE_LENGTH,CLEAN_STATUS,LAST_CLEANING_DATE) VALUES (40,'EAST-4',9,5,20,50,70,'not clean',to_date('15-JUN-2022','DD-MM-YYYY'));
INSERT INTO CAGE
(CAGE_NO,CAGE_LOCATION,MAX_CAPACITY,CLEANING_INTERVAL,CAGE_HEIGHT,CAGE_WEIGHT,CAGE_LENGTH,CLEAN_STATUS,LAST_CLEANING_DATE) VALUES (50,'EAST-1',8,6,50,30,40,'clean',to_date('16-JUN-2022','DD-MM-YYYY'));
 

INSERT INTO FOOD
(FOOD_NAME,FOOD_QUANTITY,FOOD_TYPE,FOOD_EXPDATE) VALUES ('Watermelon',580,'Fruit',to_date('12-JUN-2022','DD-MM-YYYY'));
INSERT INTO FOOD
(FOOD_NAME,FOOD_QUANTITY,FOOD_TYPE,FOOD_EXPDATE) VALUES ('Corn',500,'Seed',to_date('12-JAN-2023','DD-MM-YYYY'));
INSERT INTO FOOD
(FOOD_NAME,FOOD_QUANTITY,FOOD_TYPE,FOOD_EXPDATE) VALUES ('Fodder',590,'Straw',to_date('12-JUN-2022','DD-MM-YYYY'));
INSERT INTO FOOD
(FOOD_NAME,FOOD_QUANTITY,FOOD_TYPE,FOOD_EXPDATE) VALUES ('Red Meat',570,'Meat',to_date('12-JUN-2022','DD-MM-YYYY'));
INSERT INTO FOOD
(FOOD_NAME,FOOD_QUANTITY,FOOD_TYPE,FOOD_EXPDATE) VALUES ('Sweet potato',140,'Vegetable',to_date('12-JUN-2022','DD-MM-YYYY'));
 
 
 
 INSERT INTO PROVIDES
(FOOD_NAME,EMPLOYEE_ID) VALUES ('Watermelon','E01');
 INSERT INTO PROVIDES
(FOOD_NAME,EMPLOYEE_ID) VALUES ('Corn','E02');
 INSERT INTO PROVIDES
(FOOD_NAME,EMPLOYEE_ID) VALUES ('Fodder','E03');
 INSERT INTO PROVIDES
(FOOD_NAME,EMPLOYEE_ID) VALUES ('Red Meat','E04');
 INSERT INTO PROVIDES
(FOOD_NAME,EMPLOYEE_ID) VALUES ('Sweet potato','E01');
 
 
 INSERT INTO FOOD_SUPPLIER
(FOOD_SUPPLIER_ID,FOOD_SUPPLIER_NAME,FOOD_SUPPLIED,FOOD_SOURCE,FOOD_AMOUNT,FOOD_PRICE,DATE_OF_SUPPLY) VALUES ('FS01','Jorina','Watermelon','Mirpur-1',500,1000,to_date('12-JUN-2022','DD-MM-YYYY'));
 INSERT INTO FOOD_SUPPLIER
(FOOD_SUPPLIER_ID,FOOD_SUPPLIER_NAME,FOOD_SUPPLIED,FOOD_SOURCE,FOOD_AMOUNT,FOOD_PRICE,DATE_OF_SUPPLY) VALUES ('FS02','JON SNOW','Corn','Uttara',500,1000,to_date('12-JUN-2023','DD-MM-YYYY'));
 INSERT INTO FOOD_SUPPLIER
(FOOD_SUPPLIER_ID,FOOD_SUPPLIER_NAME,FOOD_SUPPLIED,FOOD_SOURCE,FOOD_AMOUNT,FOOD_PRICE,DATE_OF_SUPPLY) VALUES ('FS03','Ross','Red Meat','Mirpur-12',500,4000,to_date('12-JUN-2022','DD-MM-YYYY'));
 INSERT INTO FOOD_SUPPLIER
(FOOD_SUPPLIER_ID,FOOD_SUPPLIER_NAME,FOOD_SUPPLIED,FOOD_SOURCE,FOOD_AMOUNT,FOOD_PRICE,DATE_OF_SUPPLY) VALUES ('FS04','Pinkman','Sweet potato','Tongi',500,1400,to_date('12-JUN-2022','DD-MM-YYYY'));
 INSERT INTO FOOD_SUPPLIER
(FOOD_SUPPLIER_ID,FOOD_SUPPLIER_NAME,FOOD_SUPPLIED,FOOD_SOURCE,FOOD_AMOUNT,FOOD_PRICE,DATE_OF_SUPPLY) VALUES ('FS05','Ted Bundy','Fodder','Karwan Bazar',140,500,to_date('12-JUN-2022','DD-MM-YYYY'));

 INSERT INTO FOOD_SUPPLIER_PHONE_NUMBER
(FOOD_SUPPLIER_ID,FOOD_SUPPLIER_PHONE_NO) VALUES ('FS01','01798756787');
 INSERT INTO FOOD_SUPPLIER_PHONE_NUMBER
(FOOD_SUPPLIER_ID,FOOD_SUPPLIER_PHONE_NO) VALUES ('FS02','01798755327');
 INSERT INTO FOOD_SUPPLIER_PHONE_NUMBER
(FOOD_SUPPLIER_ID,FOOD_SUPPLIER_PHONE_NO) VALUES ('FS03','01429756787');
 INSERT INTO FOOD_SUPPLIER_PHONE_NUMBER
(FOOD_SUPPLIER_ID,FOOD_SUPPLIER_PHONE_NO) VALUES ('FS04','01799086787');
 INSERT INTO FOOD_SUPPLIER_PHONE_NUMBER
(FOOD_SUPPLIER_ID,FOOD_SUPPLIER_PHONE_NO) VALUES ('FS05','01798750547');

 INSERT INTO SUPPLIER_FOOD
(FOOD_SUPPLIER_ID,FOOD_NAME) VALUES ('FS01','Watermelon');
 INSERT INTO SUPPLIER_FOOD
(FOOD_SUPPLIER_ID,FOOD_NAME) VALUES ('FS02','Corn');
 INSERT INTO SUPPLIER_FOOD
(FOOD_SUPPLIER_ID,FOOD_NAME) VALUES ('FS03','Red Meat');
 INSERT INTO SUPPLIER_FOOD
(FOOD_SUPPLIER_ID,FOOD_NAME) VALUES ('FS04','Fodder');
 INSERT INTO SUPPLIER_FOOD
(FOOD_SUPPLIER_ID,FOOD_NAME) VALUES ('FS01','Sweet potato');


INSERT INTO FOOD_COST
(FOOD_SUPPLIER_ID,TRX_EXP_ID) VALUES ('FS01','01798756787');



INSERT INTO RESEARCH_WORK
(PAPERLINK,RESEARCHER_NAME,RESEARCHER_MAIL,RESEARCHER_PHONE_NO,RESEARCH_TOPIC,RESEARCH_INST) VALUES (' he_National_Zoological_Garden_at_Dhaka_Bangladesh','Zaied Talukder
','..@gmail.com','01358763219','A Retrospective Stu h','Bangladesh Agricultural University' );
 INSERT INTO RESEARCH_WORK
(PAPERLINK,RESEARCHER_NAME,RESEARCHER_MAIL,RESEARCHER_PHONE_NO,RESEARCH_TOPIC,RESEARCH_INST) VALUES ('zerin','abcd
','..@gmai.com','01358743289','something','MIST' );

INSERT INTO RESEARCH_ON_ANIMAL
(ANIMAL_ID,PAPERLINK) VALUES ('A01','...ABOUT1');
INSERT INTO RESEARCH_ON_ANIMAL
(ANIMAL_ID,PAPERLINK) VALUES ('A02','...ABOUT2');
INSERT INTO RESEARCH_ON_ANIMAL
(ANIMAL_ID,PAPERLINK) VALUES ('A03','...ABOUT3');
INSERT INTO RESEARCH_ON_ANIMAL
(ANIMAL_ID,PAPERLINK) VALUES ('A04','...ABOUT4');
INSERT INTO RESEARCH_ON_ANIMAL
(ANIMAL_ID,PAPERLINK) VALUES ('A05','...ABOUT5');

 INSERT INTO RESEARCH_ON_MUSEUM
(SPECIMEN_ID,PAPERLINK) VALUES ('S01','...ABOUT1');
 INSERT INTO RESEARCH_ON_MUSEUM
(SPECIMEN_ID,PAPERLINK) VALUES ('S02','...ABOUT2');
 INSERT INTO RESEARCH_ON_MUSEUM
(SPECIMEN_ID,PAPERLINK) VALUES ('S03','...ABOUT3');
 INSERT INTO RESEARCH_ON_MUSEUM
(SPECIMEN_ID,PAPERLINK) VALUES ('S04','...ABOUT4');
 INSERT INTO RESEARCH_ON_MUSEUM
(SPECIMEN_ID,PAPERLINK) VALUES ('S05','...ABOUT5');




INSERT INTO Visitor_Info(Register_id, visitor_Name,visitor_Gender,Visitor_Email,Visitor_DOB,Visitor_Age,Visitor_Password,Total_Visits)
values ('123','Khaled','male','khaled@gmail.com',to_date('2-2-2000','dd-mm-yyyy'),22,'ncafbaf',5);

INSERT INTO Visitor_Info(Register_id, visitor_Name,visitor_Gender,Visitor_Email,Visitor_DOB,Visitor_Age,Visitor_Password,Total_Visits)
values ('122','Enan','male','enan@gmail.com',to_date('3-2-2000','dd-mm-yyyy'),22,'ncajdajkakf',5);

INSERT INTO Visitor_Info(Register_id, visitor_Name,visitor_Gender,Visitor_Email,Visitor_DOB,Visitor_Age,Visitor_Password,Total_Visits)
values ('120','Nuraia','female','nuraia@gmail.com',to_date('4-2-2000','dd-mm-yyyy'),22,'ncafbafdafk44',5);

INSERT INTO Visitor_Info(Register_id, visitor_Name,visitor_Gender,Visitor_Email,Visitor_DOB,Visitor_Age,Visitor_Password,Total_Visits)
values ('119','zerin','female','zering@gmail.com',to_date('5-2-2000','dd-mm-yyyy'),22,'ncafba,vfdmf',5);

INSERT INTO Visitor_Info(Register_id, visitor_Name,visitor_Gender,Visitor_Email,Visitor_DOB,Visitor_Age,Visitor_Password,Total_Visits)
values ('118','Tahsin faisal','male','tahsin@gmail.com',to_date('6-2-2000','dd-mm-yyyy'),22,'ncamdfakffbaf',5);




INSERT INTO VisitorInfo_PhoneNo(Register_id, Visitor_PhoneNo)
values ('123','12345');

INSERT INTO VisitorInfo_PhoneNo(Register_id, Visitor_PhoneNo)
values ('123','678910');

INSERT INTO VisitorInfo_PhoneNo(Register_id, Visitor_PhoneNo)
values ('120','93557347');

INSERT INTO VisitorInfo_PhoneNo(Register_id, Visitor_PhoneNo)
values ('122','453257450');

INSERT INTO VisitorInfo_PhoneNo(Register_id, Visitor_PhoneNo)
values ('118','8452985704');



INSERT INTO Visitor_visitingDates(Register_id,Visiting_Dates)
values ('123',to_date('2-4-2022','dd-mm-yyyy'));

INSERT INTO Visitor_visitingDates(Register_id,Visiting_Dates)
values ('123',to_date('17-4-2022','dd-mm-yyyy'));

INSERT INTO Visitor_visitingDates(Register_id,Visiting_Dates)
values ('123',to_date('19-4-2022','dd-mm-yyyy'));

INSERT INTO Visitor_visitingDates(Register_id,Visiting_Dates)
values ('120',to_date('2-4-2022','dd-mm-yyyy'));

INSERT INTO Visitor_visitingDates(Register_id,Visiting_Dates)
values ('119',to_date('19-4-2022','dd-mm-yyyy'));




INSERT INTO Complaints(Complaint_no, Complaint_type, Compliant_date,Complian_details)
values ('1', 'animal related',to_date('19-04-2022','dd-mm-yyyy'), 'animal is rude');

INSERT INTO Complaints(Complaint_no, Complaint_type, Compliant_date,Complian_details)
values ('2', 'animal',to_date('20-04-2022','dd-mm-yyyy'), 'animal is sick');

INSERT INTO Complaints(Complaint_no, Complaint_type, Compliant_date,Complian_details)
values ('3', 'zoo related',to_date('2-04-2022','dd-mm-yyyy'), 'zoo is not good.');

INSERT INTO Complaints(Complaint_no, Complaint_type, Compliant_date,Complian_details)
values ('4', 'animal related',to_date('19-04-2022','dd-mm-yyyy'), 'animal is no ok');

INSERT INTO Complaints(Complaint_no, Complaint_type, Compliant_date,Complian_details)
values ('5', 'zoo related',to_date('19-04-2022','dd-mm-yyyy'), 'zoo not clean');




INSERT INTO Visitor_Complaints(Complaint_no, Register_id)
values ('1', '123');

INSERT INTO Visitor_Complaints(Complaint_no, Register_id)
values ('2', '122');

INSERT INTO Visitor_Complaints(Complaint_no, Register_id)
values ('3', '123');

INSERT INTO Visitor_Complaints(Complaint_no, Register_id)
values ('4', '120');

INSERT INTO Visitor_Complaints(Complaint_no, Register_id)
values ('5', '118');



INSERT INTO Ticket_info(Ticket_id,Ticket_type,Buying_date,Buying_Time, Ticket_Price, Register_id)
values ('111','zoo meuseum',to_date('19-4-2022','dd-mm-yyyy'),'1:00pm',200,'123');

INSERT INTO Ticket_info(Ticket_id,Ticket_type,Buying_date,Buying_Time, Ticket_Price, Register_id)
values ('112','zoo',to_date('20-4-2022','dd-mm-yyyy'),'2:00pm',100,'122');

INSERT INTO Ticket_info(Ticket_id,Ticket_type,Buying_date,Buying_Time, Ticket_Price, Register_id)
values ('113','zoo',to_date('21-4-2022','dd-mm-yyyy'),'3:00pm',100,'119');

INSERT INTO Ticket_info(Ticket_id,Ticket_type,Buying_date,Buying_Time, Ticket_Price, Register_id)
values ('114','meuseum',to_date('22-4-2022','dd-mm-yyyy'),'4:00pm',200,'120');

INSERT INTO Ticket_info(Ticket_id,Ticket_type,Buying_date,Buying_Time, Ticket_Price, Register_id)
values ('115','zoo meuseum',to_date('23-4-2022','dd-mm-yyyy'),'5:00pm',200,'123');



INSERT INTO Employee(Employee_id)
values('1');

INSERT INTO Employee(Employee_id)
values('2');

INSERT INTO Employee(Employee_id)
values('3');

INSERT INTO Employee(Employee_id)
values('4');

INSERT INTO Employee(Employee_id)
values('5');



INSERT INTO Employee_Complaints(Complaint_no, Employee_id)
values('1','1');

INSERT INTO Employee_Complaints(Complaint_no, Employee_id)
values('1','2');

INSERT INTO Employee_Complaints(Complaint_no, Employee_id)
values('1','3');

INSERT INTO Employee_Complaints(Complaint_no, Employee_id)
values('2','2');

INSERT INTO Employee_Complaints(Complaint_no, Employee_id)
values('3','2');




INSERT INTO Cage(Cage_no)
values('1');

INSERT INTO Cage(Cage_no)
values('2');

INSERT INTO Cage(Cage_no)
values('3');

INSERT INTO Cage(Cage_no)
values('4');

INSERT INTO Cage(Cage_no)
values('5');


INSERT INTO ComplaintsAboutCage(Complaint_no, Cage_no)
values('1','1');
INSERT INTO ComplaintsAboutCage(Complaint_no, Cage_no)
values('1','2');
INSERT INTO ComplaintsAboutCage(Complaint_no, Cage_no)
values('1','3');
INSERT INTO ComplaintsAboutCage(Complaint_no, Cage_no)
values('2','1');
INSERT INTO ComplaintsAboutCage(Complaint_no, Cage_no)
values('4','1');





INSERT INTO EMPLOYEE_PHONE
(EMPLOYEE_ID,PHONE_NO) VALUES ('124887548','01203046578' );
(EMPLOYEE_ID,PHONE_NO) VALUES ('036290932','01235786377' );
(EMPLOYEE_ID,PHONE_NO) VALUES ('185903201','01457896212' );
(EMPLOYEE_ID,PHONE_NO) VALUES ('195531201','01453322234' );
(EMPLOYEE_ID,PHONE_NO) VALUES ('375426070','01712442122' );











--queries


SELECT * FROM Visitor_Info;


SELECT * FROM Ticket_info;

SELECT * FROM Complaints;

SELECT * from Visitor_Complaints;


SELECT vi.visitor_Name, ti.Buying_Time, ti.Ticket_type, c.Complian_details
FROM Visitor_Info vi, Ticket_info ti, Complaints c, Visitor_Complaints vc 
WHERE vi.Register_id = ti.Register_id AND vi.Register_id = vc.Register_id AND vc.Complaint_no = c.Complaint_no

SELECT FOOD_SUPPLIER_ID, FOOD_SUPPLIER_NAME, DATE_OF_SUPPLY, FOOD_NAME, FOOD_QUANTITY
FROM FOOD_SUPPLIER FS,SUPPLIER_FOOD SF, FOOD F
WHERE FS.FOOD_SUPPLIER_ID=SF.FOOD_SUPPLIER_ID AND  SF.FOOD_NAME=F.FOOD_NAME


SELECT *
FROM FOOD_SUPPLIER FS,SUPPLIER_FOOD SF, FOOD F
WHERE FS.FOOD_SUPPLIER_ID=SF.FOOD_SUPPLIER_ID AND  SF.FOOD_NAME=F.FOOD_NAME


SELECT *
FROM FOOD_SUPPLIER FS,SUPPLIER_FOOD SF, FOOD F
WHERE FS.FOOD_SUPPLIER_ID=SF.FOOD_SUPPLIER_ID AND  SF.FOOD_NAME=F.FOOD_NAME AND F.FOOD_QUANTITY >= 500



