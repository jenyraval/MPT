# Managing Pentest (MPT: Pentest In Action) [![HITBSecConf HITB2022SIN](https://img.shields.io/badge/HITBSecConf-HITB2022SIN-blue?style=flat)](https://conference.hitb.org/hitbsecconf2022sin/session/mpt-pentest-in-action/) ![OWASP NewZealand2023](https://img.shields.io/badge/OWASP-NewZealand2023-blue?style=flat&link=https%3A%2F%2Fappsec.org.nz%2Fconference%2Fspeakers.html%23raval-pentest-in-action)


MPT aims to provide one stop solution for managing all pentests that are running across organisation.

## Why?
Security penetration testing is more than necessary. If not all, most organisations either have their own penetration testing team in-house or they have third party pentesters. In any fast paced organisation with multiple product lines and development planning timelines, it becomes challenging for security teams to efficiently manage all these pentest activities and effectively produce security assessment reports and track them.

In order to solve above challenges I have developed a solution called ‘Managing Pentest (MPT: Pentest in Action!)’

## What?

MPT helps us solve various problems:

- Asset DB to know all organisation assets that are in pentest process. You can’t secure what you are not aware of!
- Tracking each pentest
- Pentesting activity knowledge which comprises of what particular let say application does, or the purpose of hardware that we are testing
- When next pentester takes over the testing, all they have to do is view the asset and associated information which is already there.
- Time taken for each pentest
- Real time tracking of activity
- Issue status
- Common issues that are observed

MPT also has security pentest analytics which helps us not only track and view everything in single pane of glass but also helps with:

- Finding improvement areas to boost pen tester productivity
- Understand the current risk posture
- Understand recurring issues
- Average amount of time taken for each pentest vs asset size
- Average high/medium/low fixing time
- Most number of vulnerabilities fixed in a year
- Class of new vulnerabilities discovered
- Developer trends
- Open findings
- Critical assessments
- Asset health
- Top pentester reported findings
- Average busy time for each pentester

## Installation Guidelines

1. Download XAMPP from - https://www.apachefriends.org/download.html and follow installation flow on the screen. It will install webserver and MySQL for you.
2. If you do not want to go with XAMPP, any webserver you may have and independent installation of MySQL should suffice.
3. Once you have completed Step 1 or Step 2 depending on your choice, on XAMPP control panel start 'Apache' and 'MySQL' service.
4. Open http://localhost/phpmyadmin/ or http://IP/phpmyadmin/ on the browser.
5. Click on 'Databases' create database with name 'MPT'
6. Click on 'Import' and import the file attached here with code, named MPT.sql
7. Copy the source code available here under C:\xampp\htdocs\ folder (path will vary for linux users) and you are done with setup. 

http://localhost/MPT/login.php, default login credentials are admin/admin.


## Glimpse

https://user-images.githubusercontent.com/5736792/184294484-7fdf471c-4e9f-41b1-9bd2-befea641cb27.mp4
