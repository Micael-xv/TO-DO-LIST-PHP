create table
  task (
    id serial primary key,
    description VARCHAR(50) not null,
    completed BOOLEAN default false
  );

insert into
  task (description, completed)
values
  ('php', false);