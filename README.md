## Simple Blog Application

This PHP script implements a simple blog application that allows users to create and view blog posts. It utilizes a MySQL database for data storage.

### Features

- **Post Creation**: Users can create new blog posts by providing a title, author name, and body content. The form validates that all fields are filled out before submitting the post.
- **Post Display**: All created blog posts are displayed on the main page. Each post includes the title, author name, and a "Read more" link that directs users to the full post content.
- **Database Interaction**: The application interacts with a MySQL database to store and retrieve blog post data. It uses prepared statements and parameterized queries to prevent SQL injection.
- **Error Handling**: The script includes error handling mechanisms to catch and display any errors that occur during form submission or database interactions.

### Usage

1. Ensure that a MySQL database is set up and configured. Update the `config/db.php` file with the appropriate database connection details.
2. Access the script through a web server with PHP support.
3. Use the provided form to create new blog posts by entering a title, author name, and post body. Click the "Post" button to submit the post.
4. View all created blog posts on the main page. Each post includes a link to view the full post content.
