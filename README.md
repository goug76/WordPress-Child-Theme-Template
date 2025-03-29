# WordPress Child Theme Template

A **WordPress child theme template** designed for developers who want to extend and customize an existing theme while maintaining clean, structured code.

While I typically prefer to create my own themes, sometimes it's quicker and easier to use a **pre-made theme**. In such cases, using a **child theme** is the best approach.

This template goes beyond a standard child theme—it's a **developer-friendly framework** that allows you to:

- ✅ Override specific parts of the parent theme  
- ✅ Add custom features without relying on plugins  
- ✅ Utilize a structured object-oriented approach  

The template follows **OOP best practices**, using **singleton classes** to ensure that each class is only instantiated once. It also provides support for **SCSS** and **JavaScript in an object-oriented way**, though these features require **NPM packages**.

---

## 🚀 Features

### ✅ Object-Oriented Architecture
- Uses **singleton classes** to prevent redundant instances.
- Modular structure for **easy customization & maintainability**.
- Supports **extending or overriding** parent theme functionality.

### ✅ Custom WordPress Admin Dashboard
- Replaces the **default WordPress dashboard** with a **fully customized admin panel**.
- Adds **quick actions, recent posts, updates, and custom sections**.
- Includes a **widget area** so you can **drag & drop widgets** directly from **Appearance → Widgets**.
- Allows **admin bar customization** (remove WordPress logo, add custom branding, etc.).

### ✅ Quick Post Creation
- Adds a **"Quick Add Post" section** on the custom dashboard.
- Allows users to **draft and publish posts instantly** via AJAX.

### ✅ Custom Admin Toolbar Branding
- **Removes the default WordPress logo** from the admin bar.
- Adds a **custom logo** linked to the dashboard.

### ✅ SCSS & JavaScript Support (Optional)
- SCSS support included (requires **NPM packages**).
- JavaScript is **structured in an object-oriented way** for better organization.

---

## 📌 Installation & Usage

### 1️⃣ Set Up the Child Theme

1. Open `style.css` in the root of the theme.
2. Locate the `Template` line:

```css
Template: parent-theme-folder-name
```


3. Replace `parent-theme-folder-name` with the **exact folder name** of the parent theme.
4. Change `Theme Name:` to something memorable, e.g.,

```css
Theme Name: Parent Theme Child
```

5. Rename the theme folder to match the theme name, e.g., `parent-theme-child`.
6. Place the folder inside your WordPress `/themes/` directory.
7. Go to **WordPress Admin → Appearance → Themes** and **activate the child theme**.

---

### 2️⃣ Using the Custom Admin Dashboard

Once the theme is activated, your **WordPress dashboard** will be replaced with a **fully customized admin panel**, including:

- **Quick Actions** for easy navigation.
- **Site Overview & Updates** (Posts, Pages, Users, Plugin/Theme Updates).
- **A Widget Area** (Manage via **Appearance → Widgets**).
- **Quick Add Post Section** for **instant post creation**.

---

### 3️⃣ Customizing the Admin Bar

This template **removes the WordPress logo** and replaces it with a **custom logo** in the admin toolbar.

To change the logo, **replace the file**:  
📌 `assets/images/homelab.webp` with your own image.

If needed, modify the file path inside **`class-dashboard.php`**:

```
$custom_icon_url = get_stylesheet_directory_uri() . '/assets/images/your-logo.png';
```

---

### 4️⃣ Managing Dashboard Widgets

This template allows you to **add widgets to the admin dashboard** just like the front end.

📌 To manage widgets:
1. Go to **Appearance → Widgets**.
2. Look for **"Admin Dashboard Widgets"**.
3. Drag & drop **any widget** into this section, and it will appear on the dashboard.

---

### 5️⃣ Modifying & Extending the Theme

- PHP is structured in **classes** inside `/inc/classes/` for easy management.
- SCSS files are available inside `/src/scss/`, requiring **NPM packages** to compile.
- JavaScript follows an **object-oriented approach** and is located inside `/src/js/`.

---

## 📌 Dependencies (Optional)

If you want to **use SCSS or JavaScript compilation**, you need to install dependencies.

### Install NPM Packages
Run the following command inside the theme folder:

```css
npm install
```

To **compile SCSS** to CSS:

```
npm run build
```

---

## 🎯 Summary

✅ **Fully functional WordPress child theme template**  
✅ **Custom dashboard with Quick Actions & Widgets**  
✅ **Easy-to-manage Object-Oriented PHP structure**  
✅ **Supports JavaScript & SCSS with NPM integration**  

This template is **a great starting point** if you want to build a **custom child theme** while following **modern best practices**. 🚀🔥  

---

## 📌 Future Enhancements

This template is designed to be extended. Some ideas for future enhancements:

- **Role-based dashboard customization** (e.g., different layouts for Editors vs. Admins).
- **More dashboard widgets** (like Analytics, Security, or SEO summaries).
- **More custom settings panels** inside WordPress Admin.

---

## 💬 Feedback & Contributions

Feel free to **fork this repo, suggest improvements, or contribute**! 🎨  

🚀 **Enjoy your customized WordPress experience!** 😃🔥
