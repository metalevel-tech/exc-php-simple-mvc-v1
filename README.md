# PHP Model View Controller (MVC)

Read [../master/**README.md**](../master/README.md)

## Create database

At this stage we just create a database with one table and four rows. In the directory [`resources`](resources/) are available two manual like SQL files. We can suppress the comments and use them as SQL scrips to create or remove the `sample_db` MySQL database used in this tutorial.

```bash
sed -r '/^(-- |$)/d' sample_db_create.sql | sudo mysql
sed -r '/^(-- |$)/d' sample_db_remove.sql | sudo mysql
```
