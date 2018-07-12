create database projectbudget;

use projectbudget;

create table accounts (
    id int auto_increment primary key,
    name char(255),
    datecreated char(255),
    owner char(255),
    balance char(255),
    type char(255),
    status char(255),
    budgetStartDate char(255),
    budgetEndDate char(255)
);

create table budgets (
    id int auto_increment primary key,
    owner char(255),
    category char(255),
    archived char(255),
    startDate char(255),
    endDate char(255),
    amount float
);

create table userCategories (
    id int auto_increment primary key,
    title char(255),
    owner char(255)
);

create table defaultCategories (
    id int auto_increment primary key,
    title char(255)
);

create table transactions (
    id int auto_increment primary key,
    owner char(255),
    income int(255),
    date char(255),
    expense char(255),
    category char(255),
    account char(255)
);

create table users (
    id int auto_increment primary key,
    firstname char(255),
    lastname char(255),
    password char(255),
    email char(255),
    totalbalance char(255),
    primaryaccount char(255)
);

insert into defaultCategories (title) values ("Auto & Transport");
insert into defaultCategories (title) values ("Entertainment");
insert into defaultCategories (title) values ("Food & Dining");
insert into defaultCategories (title) values ("Insurance");
insert into defaultCategories (title) values ("Utilities");