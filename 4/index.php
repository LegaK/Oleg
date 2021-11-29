<div>
    В папке имеется 2 sql-запроса. 1 создает БД и вставляет необходимые данные, 2 делает выборку.<br>
    SELECT u.id user_id, u.firstName, u.lastName, c.name city FROM user u LEFT JOIN city c ON c.id=u.city
</div>