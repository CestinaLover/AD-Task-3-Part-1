<a name="readme-top"></a>

<br/>

<br />
<div align="center">
  <a href="https://github.com/CestinaLover/">
    <img src="./assets/img/nyebe_white.png" alt="Nyebe" width="130" height="100">
  </a>
  <h3 align="center">AD-Task-3-Part-1</h3>
</div>

<div align="center">
  A full-stack starter project using PHP, Docker, PostgreSQL, and MongoDB. Includes database checkers, env configs, and proper modular structure.
</div>

<br />

![](https://visit-counter.vercel.app/counter.png?page=CestinaLover/AD-Task-3-Part-1)

[![wakatime](https://wakatime.com/badge/user/018dd99a-4985-4f98-8216-6ca6fe2ce0f8/project/63501637-9a31-42f0-960d-4d0ab47977f8.svg)](https://wakatime.com/badge/user/018dd99a-4985-4f98-8216-6ca6fe2ce0f8/project/63501637-9a31-42f0-960d-4d0ab47977f8)

---

<br />
<br />

<details>
  <summary>Table of Contents</summary>
  <ol>
    <li>
      <a href="#overview">Overview</a>
      <ol>
        <li><a href="#key-components">Key Components</a></li>
        <li><a href="#technology">Technology</a></li>
      </ol>
    </li>
    <li><a href="#rules-practices-and-principles">Rules, Practices and Principles</a></li>
    <li><a href="#resources">Resources</a></li>
  </ol>
</details>

---

## Overview

**AD-Task-3-Part-1** is a development-ready PHP project powered by Docker, PostgreSQL, and MongoDB. It demonstrates how to set up a modular PHP environment with environment variables, database checkers, and container orchestration.

### Key Components

- Dockerized environment for PHP, PostgreSQL, and MongoDB
- `.env` configuration and dotenv loading
- PostgreSQL and MongoDB connection checkers
- Modular file structure: components, layouts, handlers, utils
- Starter pages with assets (CSS/JS/Images)
- Composer for dependency management

### Technology

#### Language
![HTML](https://img.shields.io/badge/HTML-E34F26?style=for-the-badge&logo=html5&logoColor=white)
![CSS](https://img.shields.io/badge/CSS-1572B6?style=for-the-badge&logo=css3&logoColor=white)
![JavaScript](https://img.shields.io/badge/JavaScript-F7DF1E?style=for-the-badge&logo=javascript&logoColor=black)
![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)

#### Framework/Library
![Bootstrap](https://img.shields.io/badge/Bootstrap-7952B3?style=for-the-badge&logo=bootstrap&logoColor=white)
![Tailwind CSS](https://img.shields.io/badge/Tailwind_CSS-06B6D4?style=for-the-badge&logo=tailwindcss&logoColor=white)

#### Databases
![MongoDB](https://img.shields.io/badge/MongoDB-47A248?style=for-the-badge&logo=mongodb&logoColor=white)
![PostgreSQL](https://img.shields.io/badge/PostgreSQL-336791?style=for-the-badge&logo=postgresql&logoColor=white)

#### Deployment
![Vercel](https://img.shields.io/badge/Vercel-000000?style=for-the-badge&logo=vercel&logoColor=white)

---

## Rules, Practices and Principles

<!-- Do not Change this -->

1. Always use `AD-` in the front of the Title of the Project for the Subject followed by your custom naming.
2. Do not rename `.php` files if they are pages; always use `index.php` as the filename.
3. Add `.component` to the `.php` files if they are components code; example: `footer.component.php`.
4. Add `.util` to the `.php` files if they are utility codes; example: `account.util.php`.
5. Place Files in their respective folders.
6. Different file naming Cases  
   | Naming Case | Type of code         | Example                           |
   | ----------- | -------------------- | --------------------------------- |
   | Pascal      | Utility              | Account.util.php                  |
   | Camel       | Components and Pages | index.php or footer.component.php |
7. Renaming of Pages folder names are a must, and relates to what it is doing or data it holding.
8. Use proper label in your GitHub commits: `feat`, `fix`, `refactor`, and `docs`
9. File Structure to follow below.

```
AD-Task-3-Part-1
├─ .dockerignore
├─ assets
│ ├─ css
│ │ └─ example.css
│ ├─ img
│ │ └─ nyebe_white.png
│ └─ js
│ └─ example.js
├─ bootstrap.php
├─ components
│ ├─ componentGroup
│ │ └─ example.component.php
│ └─ templates
│ └─ example.component.php
├─ compose.yaml
├─ composer.json
├─ composer.lock
├─ Dockerfile
├─ docs
│ └─ VS Code Profile Manual.md
├─ handlers
│ ├─ example.handler.php
│ ├─ mongodbChecker.handler.php
│ └─ postgreChecker.handler.php
├─ index.php
├─ pages
│ └─ ExamplePage
│ ├─ assets
│ │ ├─ css
│ │ │ └─ example.css
│ │ ├─ img
│ │ │ └─ nyebe_white.png
│ │ └─ js
│ │ └─ example.js
│ └─ index.php
├─ README.Docker.md
├─ readme.md
├─ router.php
├─ sql
│ ├─ New Table Auto Increment Script.sql
│ └─ Old Table Auto Increment.sql
├─ staticDatas
│ └─ example.staticData.php
├─ utils
│ ├─ example.util.php
│ └─ htmlEscape.util.php
└─ vendor
```


> The following should be renamed: name.css, name.js, name.jpeg/.jpg/.webp/.png, name.component.php (but not the `.component.php` part), Name.util.php (but not the `.util.php` part)

---

## Resources

| Title   | Purpose                               | Link                                     |
| ------- | ------------------------------------- | ---------------------------------------- |
| UIVERSE | A site containing UI elements for CSS | https://uiverse.io/buttons?orderBy=views |
| CODEPEN | A site for code lovers                | https://codepen.io/trending              |
| NONE    | NONE                                  | NONE                                     |
| NONE    | NONE                                  | NONE                                     |
