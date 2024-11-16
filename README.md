# Project on "Web Programming and Systems" - Crowdsourcing System for Recording and Exploiting User Activity
CEID PROJECT 2020 at the University of Patras

The purpose of this project is the development of a complete system for the collection, management, and analysis of crowdsourced information, regarding spatiotemporal human activity data through Google Location History (takeout.google.com).
In this context, the development of the crowd-sourcing system can work for the city of Patras. In the system, there are two types of users: Administrator and User.

# Admin
The Administrator gains access to the system with a desktop computer, through an appropriate mechanism username/password. When entering the system it has the following capabilities.

- Database status display (dashboard). The administrator sees on one-page suitable information, in tables and/or graphs that illustrate:

  - The distribution of user activities (percentage of registrations by type of activity)
  - The distribution of the number of registrations per user
  - The distribution of the number of registrations per month
  - The distribution of the number of registrations per day of the week
  - The distribution of the number of registrations per hour
  - The distribution of the number of registrations per year
  
- Plotting elements on a map.
By selecting year, month (Jan.-Dec.), day (Monday - Sunday), time (0-23), and activity, users' location information is displayed on a map screen in heatmap format. The administrator can choose a range of values from the above options, i.e. years (e.g. '2017-2019'), day (e.g. 'Saturday - Sunday'), time (e.g. '20:00 - 23:00'), multiple choice activity (eg "WALKING and STILL"), or for some criterion to select "all".

- Delete data.
By selecting this function and upon confirmation, the system deletes all data in the database.

- Data export.
After selecting some query criteria for map display, the administrator can export the relevant data returned, in CSV (comma-separated values), XML, or JSON format, to upload to a local computer.

# User
The user connects to the system via a desktop computer or smartphone and has the following features:

- Registration in the system. The user registers and gains access to the system by choosing a username & password of his choice, and providing his email. The user's password should be stored in then in the Database as a hashed value (e.g. MD5).
   
- Display of user data. Immediately after entering the system, they appear:
   
  - The user's eco-movement score (percentage of locations with body activity relative to all movement activities) for the current month. A graph is also displayed with the user's score for the last 12 months.
  - the period covered by the user's registrations,
  - the date of the last upload made by the user,
  - A leaderboard of the top 3 users with an abbreviated name (e.g. "Andreas K.") for last month. The leaderboard is about users with the most ecological movement. The leaderboard also contains the user with his ranking (except the top 3).

- Analysis of User Data. The user selects year and month (Jan.-Dec.). The user can select a range of values from the above options, e.g. years "2017-2019", months "April- September". The data are presented in the form of tables and/or graphs and concern:

  - The percentage of registrations by type of activity
  - The time of day with the most registrations per type of activity
  - The day of the week with the most registrations per type of activity

  A heatmap is also displayed showing the locations of the specific user only and for the selected period.

- Upload data. Users can select any data file to upload to the Database.
   
  - The system automatically "cuts" (does not enter) data that does not concern the city of Patras (>10km from coordinates 38.230462,21.753150).
  - To protect his privacy, the user may not wish to upload data from certain areas, therefore he may select, before submission, and using the map screen, one or more areas for which he does not wish data to be submitted (setting e.g. click-and-drag rectangular areas).
