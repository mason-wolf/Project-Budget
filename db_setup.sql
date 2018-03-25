create database projectbudget;
use projectbudget;
create table accounts (
    id int auto_increment primary key,
    name char(255),
    datecreated char(255),
    owner char(255),
    balance char(255),
    type char(255),
    status char(255)
);

create table budgets (
    id int auto_increment primary key,
    owner char(255),
    category char(255),
    amount int(255),
    datecreated char(255),
    datefinished char(255)
);

create table categories (
    id int auto_increment primary key,
    title char(255),
    owner char(255)
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

