# 17-CP3402-TSV-INT-SP1 Content Management Systems

## Assignment 2 - Create a WordPress Theme

### Task

In this group assignment, you will work in a team of 3 or 4 people to develop one website using WordPress.

Your site must be designed using your own custom theme (not child theme) that you create based on any
appropriate “starter theme”. As described in the presentation details below, your group must come up with
and use an appropriate modern collaborative development and deployment workflow for this assignment.

### Design

The site should use the content provided by the client, but you should perform all the usual design steps like
information architecture, interface design and information design. Unless specified as a requirement by the
client, all design decisions are up to you. Your custom theme design should be appropriate for your goal and
target audience.


### Members

* Robertson, Lachlan
  * Contact by slack @lachlanrobertson
  * Contact by email lachlan.robertson@my.jcu.edu.au
  * GitHub User @lrobert142

* Scott, Alexander
  * Contact by slack @alexanderscott
  * Contact by email alexander.scott1@my...
  * GitHub User @axrs

* Sedgman, Dale
  * Contact by slack @dalesedgman
  * Contact by email dale.sedgman@my.jcu.edu.au
  * GitHub User @Sedgy

## Git Flow for Content and Deployment

![https://github.com/CP3402-2017-1/a2-cp3402-2017-team24/raw/db-sync/resources/deployment_sequence.png][https://github.com/CP3402-2017-1/a2-cp3402-2017-team24/raw/db-sync/resources/deployment_sequence.png]

```
sequenceDiagram
    participant Localhost
    participant GitHub
    participant Staging
    participant Production

    GitHub->>Localhost: Pull Code From `development`
        Note over Localhost,Production: If you need the latest content
    Localhost->>Production: Request content database

    Production-->>Localhost: Update Content Database

    Localhost->>Localhost: Create a new branch for task

    Localhost->>GitHub: Push branch to GitHub

    loop Write Code
        Localhost->>Localhost: Integrate the task. Committing often.
    end

    Localhost->>GitHub: Push code changes to GitHub

    Note over Localhost,GitHub: Open Pull Request into `development`

    loop Review

        GitHub->>GitHub: Other team members review code
        alt If Changes are Requested
            Localhost->>Localhost: Make changes
            Localhost->>GitHub: Push changes back for review
        else If No Changes && Everyone Reviewed
            GitHub->>GitHub: Merge Request
        end
    end

    GitHub->>Staging: POST Webhook notifying of branch change
 
    Staging->>Staging: Pull code from `development`
    Staging->>Production: Request content database
    Production-->>Staging: Update Content Database
    
    GitHub->>Production: POST Webhook notifying of branch change
    Production->>Production: Pull code from `master` branch
```
