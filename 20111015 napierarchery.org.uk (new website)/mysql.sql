-- cPanel mysql backup
GRANT USAGE ON *.* TO 'napierar'@'localhost' IDENTIFIED BY PASSWORD '*7EC61B3AA144F9E48928B490E5D4FDF291B7F51B';
GRANT ALL PRIVILEGES ON `napierar\_webdb`.* TO 'napierar'@'localhost';
GRANT ALL PRIVILEGES ON `napierar\_%`.* TO 'napierar'@'localhost';
GRANT USAGE ON *.* TO 'napierar_web'@'localhost' IDENTIFIED BY PASSWORD '*451BFA864767DA8F1A215D96E93C026C2622CD3A';
GRANT ALL PRIVILEGES ON `napierar\_webdb`.* TO 'napierar_web'@'localhost';
