# Laravel-Salary-App
This web app is built to create a salary application using Laravel to create the dates on which the salary and bonus should be paid out to the employees.

This application is built to create custom artisan command called to generate a CSV file with salary dates and bonus dates of given time frame.

php artisan generate-salary-dates

- optional parameter '--start=2.23.2016' and '--end=2.23.2036' to allow the user to specify for which time-frame he want the salary-dates generated. Defaults shuold be as in
your original program.

The base salaries are paid on the last day of the month, unless that day is a Saturday or a Sunday (weekend). In that case, salaries are paid before the weekend. For the sake of this
application, please do not take into account public holidays.

On the 15th of every month bonuses are paid for the previous month, unless that day is a weekend. In that case, they are paid the first Wednesday after the 15th.

The output of the system is a CSV file, containing the payment dates. The CSV file contains a column for the month name, a column that contains the salary payment date for that month, and a column that contains the bonus payment date. The file name should
be provided as an argument to the cli command.

Application uses Laravel's Job-Queues to generate the csv file in a the background process(queue worker).

I have implements the use of laravel Services, Contracts and ServiceProvider to encapsulate the logic of calculating the Salary-dates.The command it self should be responsible for Input and output
handling.

I have listed the unit tests for the service and integration tests for the command.

I used the laravel logs to provide relevant information when application is running.

Used dodger451/laravalcodechecker to check the code quality and it passes all the code quality checks by 'php artisan cc:all'



