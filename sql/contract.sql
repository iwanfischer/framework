-- – Номер (primaryKey, varchar, 255) <input type=text>
-- – Агент  (varchar, 255) <input type=text>
-- – Жилой комплекс  (varchar) <input type=text>
-- – Тип вознаграждения (фикс или %) (varchar<FIX|PERCENT> ) <select>
-- – Размер вознаграждения при фикс, (int, от 0 до 1млн ) <input type=number>
-- – Размер вознаграждения при % (decimal 10,2, от 0 до 10%) <input type=number>
-- – Срок действия <datetime> <input datetime-local> (должен быть в будущем)
-- – Дата заключения <datetime> <input datetime-local> (дата создания)

CREATE TABLE IF NOT EXISTS contracts (
    id varchar (255) PRIMARY KEY,
    agent varchar (255),
    complex varchar (255),
    rewardType varchar (255) CHECK (rewardType = 'Фикс' or rewardType = 'Процент'),
    rewardSize decimal (10,2),
    validity datetime,
    contractDate datetime
    ) ENGINE=InnoDB;

INSERT INTO contracts (id, agent, complex, rewardType, rewardSize, validity, contractDate) VALUES ('130', 'Олег Добродушный','Скай Хаус','Фикс','100000', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);
INSERT INTO contracts (id, agent, complex, rewardType, rewardSize, validity, contractDate) VALUES ('152', 'Мария Шилова','Лесной','Фикс','50000', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);
INSERT INTO contracts (id, agent, complex, rewardType, rewardSize, validity, contractDate) VALUES ('152', 'Игорь Афонин','Луч','Процент','5%', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);

