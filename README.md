# Web-Development Project - Crowdsourcing System for Recording and Exploiting User Activity
CEID PROJECT 2020

The purpose of this project is the development of a complete system for the collection, management, and analysis of crowdsourced information, regarding spatiotemporal human activity data through Google Location History.
In this context, the development of the crowd-sourcing system can work for the city of Patras. In the system, there are two types of users: Administrator and User.

# Admin
The Administrator gains access to the system with a computer, through an appropriate mechanism username/password. When entering the system it has the following capabilities.

1. Database status display (dashboard). The administrator sees on one-page suitable information, in tables and/or graphs that illustrate:

- The distribution of user activities (percentage of registrations by type of activity)
- The distribution of the number of registrations per user
- The distribution of the number of registrations per month
- The distribution of the number of registrations per day of the week
- The distribution of the number of registrations per hour
- The distribution of the number of registrations per year
  
2. Plotting elements on a map.
By selecting year, month (Jan.-Dec.), day (Monday - Sunday), time (0-23), and activity, users' location information is displayed on a map screen in heatmap format. The administrator can choose a range of values from the above options, i.e. years (e.g. '2017-2019'), day (e.g. 'Saturday - Sunday'), time (e.g. '20:00 - 23:00'), multiple choice activity (eg "WALKING and STILL"), or for some criterion to select "all".

3. Delete data.
By selecting this function and upon confirmation, the system deletes all data in the database.

4. Data export.
After selecting some query criteria for map display, the administrator can export the relevant data returned, in CSV (comma-separated values), XML, or JSON format, to upload to a local computer.
