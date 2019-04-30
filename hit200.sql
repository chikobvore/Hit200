Create table Students(
Name varchar(50),
Surname varchar(50),
Reg_number char(8),
Program varchar(50),
Department varchar(50),
Email_address varchar(50),
Physical_address Text,
Contact varchar(17),
Gender varchar(6),
Password text,	
PRIMARY KEY(Reg_number)
);

Create table Lecturers(
Title varchar(10),
Name varchar(30),
Surname varchar(30),
Staff_id char(6),
Department varchar(30),
Email_address  varchar(30),
Contact varchar(17),
Role varchar(20),
Gender varchar(6),
Password text,
PRIMARY KEY(Staff_id)
);

Create table Projects(
Project_id char(10),
Year char(9),
Level char(6),
Project_title varchar(100),
Project_description text,
Department varchar (50),
Supervisor char(6),
Status 
Stage varchar(100),
PRIMARY KEY(Project_id),
FOREIGN KEY(Supervisor) REFERENCES Lecturers(Staff_id)
);

Create table Projects_Files(
Project_id char(10),
File_id INT NOT NULL AUTO_INCREMENT,
File_name varchar(20),
File_description varchar(100),
File_path varchar(255),
PRIMARY KEY(File_id),
FOREIGN KEY(Project_id) REFERENCES Projects(Project_id)
);

Create table Project_developers(
Developer_id INT NOT NULL AUTO_INCREMENT,
Project_id char(10),
Reg_number char(8),
PRIMARY KEY (Developer_id),
FOREIGN KEY (Project_id) REFERENCES Projects(Project_id),
FOREIGN KEY(Reg_number) REFERENCES Students(Reg_number)
);

Create table Assessment_details(
Assessment_id INT NOT NULL AUTO_INCREMENT,
Assessment_title varchar(50),
Assessment_objectives Text,
Year varchar (9),
Department varchar(30),
Proposed_date varchar(15),
Status varchar (15),
Assement_date varchar(15),
PRIMARY KEY (Assessment_id)
);

Create table Assessment_items(
Assessment_id INT,
Item_id INT NOT NULL AUTO_INCREMENT,
Item varchar(50),
Item_mark INT,
Description text,
PRIMARY KEY(Item_id),
FOREIGN KEY(Assessment_id) REFERENCES Assessment_details(Assessment_id)
);

Create table Assessment_marks(
    Mark_id INT NOT NULL AUTO_INCREMENT,
    Staff_id char(6),
    Project_id char(10),
    Assessment_id INT,
    Item_id int,
    Mark Double,
    Comment text,
    Lock_key VARCHAR(255),
    PRIMARY KEY(Mark_id),
    FOREIGN KEY(Staff_id) REFERENCES Lecturers(Staff_id)
    FOREIGN KEY(Project_id) REFERENCES Projects(Project_id)
    FOREIGN KEY(Assessment_id) REFERENCES Assessment_details(Assessment_id),
    FOREIGN KEY(Item_id) REFERENCES Assessment_items(Item_id)
) ;
Create table Lecturer_assessment_marks(
    Mark_id INT NOT NULL AUTO_INCREMENT,
    Staff_id char(8),
    Project_id char(10),
    Assessment_id INT,
    Mark DOUBLE,
    Total_mark double,
    Overal_mark DOUBLE,
    Comment text;
    PRIMARY KEY(Mark_id),
    FOREIGN KEY(Staff_id) REFERENCES Lectures(Staff_id)
    FOREIGN KEY(Project_id) REFERENCES Projects(Project_id)
    FOREIGN KEY(Assessment_id) REFERENCES Assessment_details(Assessment_id)
);
Create table Final_stage_mark
    Mark_id INT NOT NULL AUTO_INCREMENT,
    Project_id char(10),
    Assessment_id INT,
    Mark DOUBLE,
    Total_mark double,
    Overal_mark DOUBLE,
    Lock_key VARCHAR(255),
    Assessed_by INT,
    PRIMARY KEY(Mark_id),
    FOREIGN KEY(Project_id) REFERENCES Projects(Project_id),
    FOREIGN KEY(Assessment_id) REFERENCES Assessment_details(Assessment_id)

);

Create TABLE Final_mark(
    Mark_id INT NOT NULL AUTO_INCREMENT,
    Project_id char(10),
    Mark DOUBLE,
    Grade VARCHAR(5),
    PRIMARY KEY(Mark_id),
    FOREIGN KEY(Project_id) REFERENCES Projects(Project_id)
);
Create TABLE invitations (
    id INT NOT NULL AUTO_INCREMENT,
    Project_id VARCHAR(10),
    Sender VARCHAR(10),
    Receiver VARCHAR(10),
    Status VARCHAR(100),

    PRIMARY KEY(id),
    FOREIGN KEY(Sender) REFERENCES Students(Reg_number),
    FOREIGN KEY(Receiver) REFERENCES Students(Reg_number),
    FOREIGN KEY(Project_id) REFERENCES Projects(Project_id)

);

