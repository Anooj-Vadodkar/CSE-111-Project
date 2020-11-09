-- Inserting "Ori And The Blind Forest", a 2015 game, into the "videogamesales" table. Differing sales for PC and Xbox means differing queries for both.
INSERT INTO videogamesales(name, platform, year, genre, publisher, na_sales_millions, eu_sales_millions, jp_sales_millions, other_sales_millions, global_sales_millions)
VALUES ('Ori And The Blind Forest', 'XOne', 2015, 'Platform', 'Microsoft Game Studios', 1.2, 0.5, 0.05, 0.3, 2.1);
INSERT INTO videogamesales(name, platform, year, genre, publisher, na_sales_millions, eu_sales_millions, jp_sales_millions, other_sales_millions, global_sales_millions)
VALUES ('Ori And The Blind Forest', 'PC', 2015, 'Platform', 'Microsoft Game Studios', 1.5, 0.2, 0.4, 0.025, 2.35);
-- Update the yearly company sales to reflect addition of sales
UPDATE yearlycompanysales 
SET na_sales_millions = na_sales_millions  + 1.2,eu_sales_millions = eu_sales_millions  + 0.5, jp_sales_millions = jp_sales_millions  + 0.05, other_sales_millions = other_sales_millions + 0.3, global_sales_millions = global_sales_millions + 2.1
WHERE company = 'Microsoft' AND year = '2015';
UPDATE yearlycompanysales 
SET na_sales_millions = na_sales_millions  + 1.5,eu_sales_millions = eu_sales_millions  + 0.2, jp_sales_millions = jp_sales_millions  + 0.5, other_sales_millions = other_sales_millions + 0.025, global_sales_millions = global_sales_millions + 2.35
WHERE company = 'Different Creators' AND year = '2015';
-- Update the publishers and genre to reflect addition of sales 
UPDATE publisher 
SET na_sales_millions = na_sales_millions  + 2.7,eu_sales_millions = eu_sales_millions  + 0.7, jp_sales_millions = jp_sales_millions  + 0.55, other_sales_millions = other_sales_millions + 0.325, global_sales_millions = global_sales_millions + 4.275
WHERE publisher = 'Microsoft Game Studios';
UPDATE genre 
SET quantity_sold = quantity_sold +   4.275, percentage_sold = quantity_sold/(SELECT sum(quantity_sold) FROM genre) * 100
WHERE genre = 'Platform';


-- Inserting "NieR: Automata", a 2017 game, into the "videogamesales" table. Differing sales for PC and PS4 means differing queries for both. 
-- Yearlycompanysales also needs to include a new place for PC 2017, since no games from 2017 are in the original list.  
INSERT INTO videogamesales(name, platform, year, genre, publisher, na_sales_millions, eu_sales_millions, jp_sales_millions, other_sales_millions, global_sales_millions)
VALUES ('NieR: Automata', 'PC', 2017, 'Action', 'Square Enix', 0.04, 0.2, 0.5, 0.031, 0.771);
INSERT INTO videogamesales(name, platform, year, genre, publisher, na_sales_millions, eu_sales_millions, jp_sales_millions, other_sales_millions, global_sales_millions)
VALUES ('NieR: Automata', 'PS4', 2017, 'Action', 'Square Enix', 0.08, 0.1, 0.56, 0.04, 0.78);
-- Update the yearly sales for Sony (they already have two entries in the year 2017); insert the yearly sales for Different Creators (No sales exist for 2017 as of yet)
UPDATE yearlycompanysales 
SET na_sales_millions = na_sales_millions + 0.08, eu_sales_millions = eu_sales_millions  + 0.1, jp_sales_millions = jp_sales_millions  + 0.56, other_sales_millions = other_sales_millions + 0.04, global_sales_millions = global_sales_millions +  0.78
WHERE company = 'Sony' AND year = '2017';
INSERT INTO yearlycompanysales (company, year, na_sales_millions, eu_sales_millions, jp_sales_millions, other_sales_millions, global_sales_millions) 
VALUES ('Different Creators', 2017,  0.04, 0.2, 0.5, 0.031, 0.771);
-- Update the publishers and genre to reflect addition of sales
UPDATE publisher 
SET na_sales_millions = na_sales_millions  + 0.12,eu_sales_millions = eu_sales_millions  + 0.3, jp_sales_millions = jp_sales_millions  + 1.06, other_sales_millions = other_sales_millions + 0.071, global_sales_millions = global_sales_millions + 1.551
WHERE publisher = 'Square Enix';
UPDATE genre 
SET quantity_sold = quantity_sold + 1.551, percentage_sold = quantity_sold/(SELECT sum(quantity_sold) FROM genre) * 100
WHERE genre = 'Action';


-- Inserting "The Legend Of Zelda: Breath Of The Wild", a 2017 game on the Nintendo Switch, into the "videogamesales" table. The switch is a console that isn't in the table, though it is from the 
-- familiar creator Nintendo. 
INSERT INTO videogamesales(name, platform, year, genre, publisher, na_sales_millions, eu_sales_millions, jp_sales_millions, other_sales_millions, global_sales_millions)
VALUES ('The Legend Of Zelda: Breath Of The Wild', 'NS', 2017, 'Adventure', 'Nintendo', 2.5, 1.8, 3.0, 2.0, 9.3);
-- No Nintendo sales exist for the year 2017, so we have to create it like with "different creators" in the last example.
INSERT INTO yearlycompanysales (company, year, na_sales_millions, eu_sales_millions, jp_sales_millions, other_sales_millions, global_sales_millions) 
VALUES ('Nintendo', 2017,  2.5, 1.8, 3.0, 2.0, 9.3);
-- Update the publishers to reflect addition of sales
UPDATE publisher 
SET na_sales_millions = na_sales_millions  + 2.5, eu_sales_millions = eu_sales_millions  + 1.8, jp_sales_millions = jp_sales_millions  + 3.0, other_sales_millions = other_sales_millions + 2.0, global_sales_millions = global_sales_millions + 9.3
WHERE publisher = 'Nintendo';
-- The Nintendo Switch console isn't one we have in the "platforms" table; we need to add it now.
INSERT INTO platforms(platform, fullname, creator, year_released) VALUES ('NS', 'Nintendo Switch', 'Nintendo', 2017);
UPDATE genre 
SET quantity_sold = quantity_sold + 9.3, percentage_sold = quantity_sold/(SELECT sum(quantity_sold) FROM genre) * 100
WHERE genre = 'Adventure';


-- Inserting "Disco Elysium", a 2019 PC game, into the "videogamesales" table. The publisher, ZA/UM, is a recent one, and so needs to be added to the "publisher" table. As well, the year 
-- 2019 has to be added to yearlysales. 
INSERT INTO videogamesales(name, platform, year, genre, publisher, na_sales_millions, eu_sales_millions, jp_sales_millions, other_sales_millions, global_sales_millions)
VALUES ('Disco Elysium', 'PC', 2019, 'Role-Playing', 'ZA/UM', 0.04, 1.3, 0.00, 0.3, 1.64);
-- No sales exist in general for the year 2019, so we have to create it. 
INSERT INTO yearlycompanysales (company, year, na_sales_millions, eu_sales_millions, jp_sales_millions, other_sales_millions, global_sales_millions) 
VALUES ('Different Creators', 2019,  0.04, 1.3, 0.00, 0.3, 1.64);
-- Create the publisher "ZA/UM", and use the sales data from earlier to fill out what their sales are.
INSERT INTO publisher(publisher, na_sales_millions, eu_sales_millions, jp_sales_millions, other_sales_millions, global_sales_millions) VALUES
('ZA/UM', 0.04, 1.3, 0.00, 0.3, 1.64);
UPDATE genre 
SET quantity_sold = quantity_sold + 1.64, percentage_sold = quantity_sold/(SELECT sum(quantity_sold) FROM genre) * 100
WHERE genre = 'Role-Playing';


-- Inserting "Destiny 2", a 2017 shooter, into the "videogamesales" table, specifically for it's Google Stadia release. This is the ultimate case, where the platform, publisher, even genre are different. 
-- Realistically, this case will never come up until something completely revolutionary happens in the gaming world. But if it DOES, then this is the query that will handle all of it. 
INSERT INTO videogamesales(name, platform, year, genre, publisher, na_sales_millions, eu_sales_millions, jp_sales_millions, other_sales_millions, global_sales_millions)
VALUES ('Destiny 2', 'GS', 2019, 'Multiplayer', 'Google', 0.04, 0.02, 0.00, 0.01, 0.07);
-- First, create the publisher, company (who made the console), and connect them via the subsidiary table.
INSERT INTO publisher(publisher, na_sales_millions, eu_sales_millions, jp_sales_millions, other_sales_millions, global_sales_millions) VALUES
('Google', 0.04, 0.02, 0.00, 0.01, 0.07);
INSERT INTO company(company, country, headquarters, founder, year_founded) VALUES 
('Google', 'USA', 'Mountain View, California', 'Larry Page', 1998);
INSERT INTO subsidiary(company, publisher) VALUES ('Google', 'Google');
-- Now we need to worry about the platform, the Google Stadia. 
INSERT INTO platforms(platform, fullname, creator, year_released) VALUES ('GS', 'Google Stadia', 'Google', 2019);
-- Multiplayer doesn't exist in genre yet, so let's add that to!
INSERT INTO genre(genre, description, quantity_sold, percentage_sold) VALUES ('Multiplayer', 'A multiplayer video game is a video game in which more than one person can play in the same game environment at the same time, either locally  or online over the internet.',
0.07, 0.07/(SELECT sum(quantity_sold) FROM genre) * 100);
-- Last but not least, I will insert into yearlycompanysales all this data to make it complete.
INSERT INTO yearlycompanysales (company, year, na_sales_millions, eu_sales_millions, jp_sales_millions, other_sales_millions, global_sales_millions) 
VALUES ('Google', 2019, 0.04, 0.02, 0.00, 0.01, 0.07);

-- Those are all the cases of what can happen when a user inputs a game as a suggestion for an entry. Thank you!