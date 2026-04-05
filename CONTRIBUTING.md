# Contributing to SETAS Backend

Thank you for considering contributing to **SETAS — Backend**! We appreciate your input and strive to make contributing as easy and straightforward as possible. This document provides guidelines to help you get started.

## 📋 Table of Contents

- [Code of Conduct](#code-of-conduct)
- [Reporting Bugs](#reporting-bugs)
- [Suggesting Features](#suggesting-features)
- [Submitting Pull Requests](#submitting-pull-requests)
- [Coding Standards](#coding-standards)
- [Need Help?](#need-help)

---

## Code of Conduct

We are committed to providing a welcoming and harassment-free environment for all contributors. Please treat all community members with respect.

---

## Reporting Bugs

### Guidelines
- **Be Clear and Descriptive**: Provide as many details as possible
- **Include Steps to Reproduce**: Clear steps to replicate the issue
- **Expected vs. Actual Behavior**: What should happen vs. what actually happened
- **Environment Details**: PHP version, Laravel version, OS, MySQL version
- **Check for Duplicates**: Search existing issues before creating a new one

### Example Bug Report
```
Title: Gmail reminder fails for courriers with special characters

Description:
Steps to reproduce:
1. Create a courrier with é in the subject
2. Run `php artisan reminders:send`
3. Check logs

Expected: Email sent successfully
Actual: SMTP error

Environment: PHP 8.2, Laravel 12, MySQL 8.0
```

---

## Suggesting Features

### Feature Request Process
1. **Open an Issue**: Create a new issue with the `feature-request` label
2. **Describe Your Idea**: Explain the feature and why it's needed
3. **Discuss First**: For significant changes, wait for feedback before coding
4. **Align with Goals**: Ensure it fits the project''s mission

### Example Feature Request
```
Title: Add bulk email export for courriers

Description: Allow users to export multiple courrier records as PDF or CSV
Use case: Monthly reporting and archiving
```

---

## Submitting Pull Requests

### Branch Naming Convention
- `fix/issue-name` — for bug fixes
- `feature/feature-name` — for new features
- `docs/doc-name` — for documentation updates
- `refactor/component-name` — for code refactoring

### Submission Steps

1. **Fork the Repository**
   `bash
   git clone https://github.com/your-username/SETAS-BackEnd.git
   `

2. **Create a Feature Branch**
   `bash
   git checkout -b feature/your-feature-name
   `

3. **Make Your Changes**
   - Follow coding standards (see below)
   - Test thoroughly
   - Update documentation if needed

4. **Commit with Clear Messages**
   `bash
   git commit -m feat: add bulk email export functionality
   git commit -m fix: resolve SMTP timeout on reminder send
   `

5. **Push and Open PR**
   `bash
   git push origin feature/your-feature-name
   `
   - Provide a clear PR description
   - Reference related issues with `Closes #123`
   - Request review from maintainers

---

## Coding Standards

### PHP & Laravel
- **PSR-12**: Follow PSR-12 code style
- **Naming**: Use camelCase for variables/methods, PascalCase for classes
- **Comments**: Use PHPDoc blocks for methods
- **Validation**: Use Laravel form requests for validation
- **Database**: Follow migration naming conventions

### Example: Method Documentation
`php
/**
 * Send reminder emails for courriers due in 5 days.
 *
 * @return void
 */
public function sendReminders()
{
    // Implementation
}
`

### JavaScript
- **ES6 Modules**: Use modern JavaScript syntax
- **Formatting**: Follow project''s Tailwind CSS conventions
- **Comments**: Document complex logic

### Test Coverage
- Write tests for new features
- Run `php artisan test` before submitting PR
- Aim for >80% code coverage

### Documentation
- Update README if you add/change features
- Update API endpoints documentation
- Add migration notes if database schema changes

---

## Need Help?

- **Questions?** Open a discussion in GitHub Discussions
- **Setup Issues?** Check [Installation Section](README.md#-installation) in README
- **API Questions?** See [API Endpoints](README.md#-api-endpoints)
- **Email Config Issues?** Review [Environment Variables](README.md#-environment-variables)

---

## Review Process

All PRs will be reviewed by maintainers for:
- ✅ Code quality and standards
- ✅ Test coverage
- ✅ Documentation updates
- ✅ Breaking changes
- ✅ Security concerns

We appreciate your contributions and look forward to collaborating with you! 🎉
