## Measures 

![CodeLines](https://github.com/CuteDandelion/docs-german-translator/blob/main/SonarQubeMeasures/code_lines.svg)
![CodeSmells](https://github.com/CuteDandelion/docs-german-translator/blob/main/SonarQubeMeasures/code_smells.svg)
![CodeCoverage](https://github.com/CuteDandelion/docs-german-translator/blob/main/SonarQubeMeasures/coverage.svg)
![CodeMaintainability](https://github.com/CuteDandelion/docs-german-translator/blob/main/SonarQubeMeasures/maintainability.svg)
![QualityGate](https://github.com/CuteDandelion/docs-german-translator/blob/main/SonarQubeMeasures/quality_gate.svg)
![CodeReliability](https://github.com/CuteDandelion/docs-german-translator/blob/main/SonarQubeMeasures/reliability.svg)
![TechnicalDebt](https://github.com/CuteDandelion/docs-german-translator/blob/main/SonarQubeMeasures/technical_debt.svg)

## SonarQube 

- [ImageOverview](https://github.com/CuteDandelion/docs-german-translator/tree/main/SonarQubeMeasures)

## Table Of Content

- [ABOUT](https://github.com/CuteDandelion/docs-german-translator#about)
- [REQUIREMENTS](https://github.com/CuteDandelion/docs-german-translator#requirements)
- [PREREQUISITE](https://github.com/CuteDandelion/docs-german-translator#prerequisite)
- [REFERENCES/TEMPLATES](https://github.com/CuteDandelion/docs-german-translator#referencestemplates)
- [GIT COMMIT HISTORY](https://github.com/CuteDandelion/docs-german-translator#git-commit-history)
- [UML DIAGRAMS](https://github.com/CuteDandelion/docs-german-translator#uml-diagrams)
- [REQUIREMENT ENGINEERING/PROJECT MANAGEMENT TOOLS](https://github.com/CuteDandelion/docs-german-translator#requirement-engineeringproject-management-tools)
- [CHEAT SHEET](https://github.com/CuteDandelion/docs-german-translator#cheat-sheet)
- [DDD (DOMAIN DRIVEN DEVELOPMENT)](https://github.com/CuteDandelion/docs-german-translator#ddd-domain-driven-development)
- [CLEAN CODE (CODE SNIPPET,BUILD & UNIT TESTS)](https://github.com/CuteDandelion/docs-german-translator#clean-code-code-snippetbuild--unit-tests)
- [IDE](https://github.com/CuteDandelion/docs-german-translator#ide)

## ABOUT 

Personal Laravel GPT chatbot for German Learning & Documents Translation . Basically a personal mini customizable german teacher and assistant. Free of Charge.
Lets learn German !!!!!! Los Geht's !!!!!!

## REQUIREMENTS 

- The GPT Chatbot MUST be able to make conversation with user in German and in English depending on contexts .
- The GPT Chatbot MUST have a german teacher/assistant persona and rules which allow the chatbot to stay in character.
- The GPT Chatbot MUST be able to handle a single file upload (preferable .PDF).
- The GPT Chatbot MUST be able to display uploaded file.
- The GPT Chatbot MUST be able to translate , analyze & make a summary of uploaded file (Languages -> English)

## PREREQUISITE 

### Chat Interface (PHP Base)

- Laravel >= 9.x.x
- composer >= 2.x.x
- PHP=8.0.30
- Node>=v12.xx.xx


### GPT API (Python Base) (Refer To Another Repo ... TBD)

- python>=3.10.2
- fastapi>=0.67.0
- celery>=5.1.2
- uvicorn[standard]>=0.13.4
- gunicorn>=20.1.0
- freeGPT>=1.3.4
- Pillow>=10.1.0

## REFERENCES/TEMPLATES

- [Laravel Botman.io Template](https://github.com/shoutsdev/laravel-botman-chatbot) 
- [Laravel Botman.io Documentation](https://botman.io/2.0/welcome)
- [FreeGPT Python Library Documentation](https://github.com/Ruu3f/freeGPT/tree/main)
- [Python FastAPI Quick Template](https://github.com/BreezeWhite/simple-fastapi/tree/main)
- [Tesseract OCR Setup & Usage Documentation](https://github.com/tesseract-ocr/tesseract#about)
- [Image-to-Image AI Generator Documentation](https://huggingface.co/docs/diffusers/main/en/using-diffusers/img2img)


## GIT COMMIT HISTORY

- [Git Commits History](https://github.com/CuteDandelion/docs-german-translator/commits/main)

## UML DIAGRAMS

- [UML Diagrams - Link](https://github.com/CuteDandelion/docs-german-translator/tree/main/UMLDiagrams)

## REQUIREMENT ENGINEERING/PROJECT MANAGEMENT TOOLS

- [Notion.so(Standard)-"if you do not see any tasks after clicking this link, click Getting Started then Tasks to view."](https://www.notion.so/7c64d9edc6a74ca582da0067855640b8?v=3cacb503d3784ebaa85231f940ed193a&pvs=4)
- [Jira (Commercial) - Might not be able to access due to permission limitation,image overview is provided instead](https://cutedandelion.atlassian.net/jira/software/projects/KAN/boards/1/timeline)
- [Jira (ImageOverview)](https://github.com/CuteDandelion/docs-german-translator/tree/main/JIRA)

## CHEAT SHEET

## DDD (DOMAIN DRIVEN DEVELOPMENT)
- [Domain Driven Development (PDF)](https://github.com/CuteDandelion/docs-german-translator/blob/main/DomainDrivenDev/DomainDrivenDesign.pdf)

## CLEAN CODE (CODE SNIPPET,BUILD & UNIT TESTS)

### Code Snippet ###

- [Exception-Handling-Example](https://github.com/CuteDandelion/docs-german-translator/blob/d5969c4367a29977c1c32b985b787341e74337fe/mysimpleGPTBot/app/Http/Controllers/BotmanController.php#L276-L288)
- [Method-Abstraction-For-Easy-Readability-Example](https://github.com/CuteDandelion/docs-german-translator/blob/d5969c4367a29977c1c32b985b787341e74337fe/mysimpleGPTBot/app/Http/Controllers/BotmanController.php#L59-L74)
- [Function-With-Clear-Purpose-Example](https://github.com/CuteDandelion/docs-german-translator/blob/d5969c4367a29977c1c32b985b787341e74337fe/mysimpleGPTBot/app/Http/Controllers/BotmanController.php#L195-L210)
- [Meaningful-Naming-Conventions-Comments-Example (Methods/Variables/Properties)](https://github.com/CuteDandelion/docs-german-translator/blob/d5969c4367a29977c1c32b985b787341e74337fe/mysimpleGPTBot/app/Http/Controllers/BotmanController.php#L260-L274)
- [Tests-With-Specific-Goal-Example (Single Assert OR Multiple Asserts which are related)](https://github.com/CuteDandelion/docs-german-translator/blob/5100c68c3167f5c0eb45ad6ffe50e6863457ade4/mysimpleGPTBot/tests/Unit/ExampleTest.php#L61-L94)

### Build Management Tool ###

- [Jenkins (Setup to build automatically + Run Tests)](https://github.com/CuteDandelion/docs-german-translator/tree/main/JenkinsFiles)
- [Github Actions (Setup to build automatically + Run Tests + Run SonarQube Scan)](https://github.com/CuteDandelion/docs-german-translator/blob/main/.github/workflows/github_build.yml)

### Github Actions History ###
- [Actions History](https://github.com/CuteDandelion/docs-german-translator/actions/runs/7425547388)

### Unit Tests && Feature Tests ###

- [Tests Scripts (Under Feature/ExampleTest.php && Unit/ExampleTest.php)](https://github.com/CuteDandelion/docs-german-translator/tree/main/mysimpleGPTBot/tests)

## IDE

- Visual Studio Code

### Favourite Shortcut Keys ###

- Ctrl + F : Finds a specific text in the code
- Ctrl + A: Selects all the lines in the current file
- Ctrl + S: Saves the pending changes in the current file
- Ctrl + X: Cut line (empty selection)

- F5: Starts the application in debug mode
- Ctrl + F5: Starts the application without debug mode
- Shift + F5: Stops the application when it's running
- Ctrl + Shift + F5: Stops the application execution, rebuilds the project, and creates a new debugging session
- F9: Places or removes a breakpoint
- F10: Skips the execution of code when debugging
- F11: Debugs source code line by line

- F4: Opens the Properties window.


