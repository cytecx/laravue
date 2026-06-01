# Laravue — Property Listing & Realtor Management System

A modern, high-performance Single Page Application (SPA) built to learn and demonstrate full-stack web development using **Laravel**, **Vue 3 (Composition API)**, **Inertia.js**, and **Tailwind CSS**. 

This project was built following a comprehensive multi-part course curriculum, taking a monolithic Laravel application and converting it into a fluid, reactive SPA.

---

## 🚀 Key Course Milestones & Implementation Details

Below is the breakdown of the application features mapped directly to the 13 course chapters:

### 1. Creating the Project & Setting Up Laravel, Vue & Inertia
* **Setup**: Bootstrapped the Laravel backend with a Vue 3 frontend using Vite as the build tool.
* **Inertia.js Integration**: Installed and configured `inertia-laravel` on the server and `@inertiajs/vue3` on the client. This allows rendering Vue views directly from Laravel controllers without needing to build a separate REST/GraphQL API or handle client-side routing state separately.
* **Ziggy Routes**: Integrated Ziggy to enable using Laravel named routes directly inside Vue components.

### 2. Your First SPA
* **Client-Side Routing**: Set up Inertia links (`<Link>`) to enable seamless client-side page transitions without page reloads.
* **Layouts**: Implemented shared application layouts (e.g., `MainLayout.vue`) to keep headers, footers, and persistent UI states consistent across views.
* **SPA Lifecycle**: Verified correct page mounting, layout state inheritance, and state sharing.

### 3. Working with the Database
* **Migrations**: Designed database schemas for listings (beds, baths, area, city, post code, street, street number, price, sold status) and related tables.
* **Models & Factories**: Created Eloquent models with corresponding factories and seeders to populate local environments with realistic mock property data.
* **Eloquent ORM**: Implemented raw CRUD functionality through controller actions and database queries.

### 4. Adding Some Style (Tailwind CSS)
* **Design System**: Set up Tailwind CSS (v4) with custom utility classes, inputs, and buttons.
* **Responsive Layouts**: Designed pages to be responsive across mobile, tablet, and desktop viewports using Tailwind's flexbox, grid system, and media queries.
* **Visual Polish**: Created card containers (`Box.vue`), dynamic labels, form inputs, and buttons with custom hover transitions and styles.

### 5. Monthly Payment Calculator (Mini Vue Project Within a Project)
* **Interactive UI**: Embedded a fully reactive mortgage calculator on the listing show page (`Show.vue`).
* **Composition API**: Built a reusable composable (`useMonthlyPayment.js`) that uses computed properties to calculate the monthly payment, total interest, and total amount paid.
* **Sliders**: Integrated responsive sliders for interest rates and duration (years), updating calculation details instantly in the UI.

### 6. Authentication & Security
* **Authentication Flow**: Developed registration, login, and logout functionalities using standard Laravel session-based authentication.
* **Route Protection**: Added middleware blocks (`auth`, `guest`) to secure routes and pages on both the frontend and backend.
* **Inertia Shared Data**: Configured standard middleware (`HandleInertiaRequests`) to inject the authenticated user context dynamically into all Vue pages.

### 7. Database Relations & User Authorization
* **Relational DB Design**: Linked Listings to Users (Realtors) via foreign keys, set up listing image relationships, and linked property offers to users (Buyers).
* **Laravel Policies**: Created policies (`ListingPolicy`, `OfferPolicy`) to restrict access. Realtors can only edit, delete, or upload images to listings they own, and only they can accept/reject offers.

### 8. Data Pagination & Filtering
* **Dynamic Search**: Created a robust filtering system (`Listing::scopeFilter`) allowing users to search by price range, bed/bath count, and area.
* **Sorting**: Implemented sorting options (by price, date created, beds, etc.) that update query strings automatically.
* **Pagination**: Created a reusable `Pagination.vue` component that handles backend pagination links cleanly within the SPA.

### 9. The My Account Section (Realtor Dashboard)
* **Realtor Hub**: Added a dedicated sub-section for Realtors (`/realtor/listing`) to monitor their properties.
* **Soft Deletes**: Configured soft deleting so deleted listings can be reviewed and easily restored by their owners.
* **Offer Status**: Displays count of offers received per listing, directly visible on the Realtor dashboard.

### 10. File Uploading
* **Image Uploads**: Added multi-image upload forms to listing pages.
* **Storage Configuration**: Configured file storage disks, uploading files securely, and generating symlinks (`storage:link`) for public viewing.
* **Optimized Image Feed**: Implemented a responsive image grid inside property listings, with dynamic backend validation.

### 11. Making Offers
* **Offer Submission**: Enabled authenticated buyers to make custom monetary offers directly from the property details page.
* **Offer Reviews**: Realtors can view all received offers for a listing, complete with information about the buyer and their bid.
* **Accepting Offers**: Developed a transaction mechanism (`RealtorListingAcceptOfferController`) to accept an offer, automatically marking the listing as sold and rejecting other competing offers.

### 12. Notifications (Informing Users About What Happened)
* **Database Notifications**: Created custom database notification templates triggered when offers are placed or accepted.
* **Notifications Center**: Built a navigation notification count and listing page, allowing users to view updates and mark them as read (`NotificationSeenController`).

### 13. Sending Email & User Verification
* **Email Verification**: Wired up Laravel's verification flow, requiring new users to confirm their email address before accessing Realtor dashboards.
* **Signed Routes**: Utilized signed route URLs sent via mail to handle secure verification actions.

---

## 🛠 Tech Stack

* **Backend**: Laravel 11/13, Eloquent ORM
* **Frontend**: Vue 3 (Composition API, `<script setup>`), Inertia.js
* **Styles**: Tailwind CSS (v4)
* **Build Tool**: Vite
* **Routing**: Laravel Routing + Ziggy (named routes in JS)
* **Testing**: PHPUnit

---

## ⚙️ Installation & Setup

1. **Clone the Repository**
   ```bash
   git clone https://github.com/your-username/laravue.git
   cd laravue
   ```

2. **Run the Automated Setup Script**
   The project includes a pre-configured composer script to handle installs, migrations, key generation, and frontend compilation:
   ```bash
   composer run setup
   ```

3. **Configure Environment Variables**
   Rename `.env.example` to `.env` (handled by setup) and configure your database and mail credentials:
   ```env
   DB_CONNECTION=sqlite
   # Or mysql / pgsql if you prefer
   ```

4. **Run Dev Servers**
   Run the dev servers concurrently (serves the backend app, processes queues, opens Vite client HMR, and streams logs):
   ```bash
   npm run dev
   # Or using composer shortcut:
   composer run dev
   ```

5. **Run Tests**
   Ensure all functions are green:
   ```bash
   composer run test
   ```
