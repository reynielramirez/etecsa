# Default target
all: README.md

# Rule to create README.md from README.html
README.md: README.html Makefile
	@if ! command -v pandoc >/dev/null 2>&1; then \
		echo "pandoc is not installed. Installing with Homebrew..."; \
		if ! command -v brew >/dev/null 2>&1; then \
			echo "Error: Homebrew is not installed. Please install Homebrew first."; \
			exit 1; \
		fi; \
		brew install pandoc || { echo "Failed to install pandoc. Exiting."; exit 1; }; \
	fi
	@echo "# Email Attachment Helper" > README.md
	@echo >> README.md
	pandoc README.html -t gfm >> README.md

	@echo "Successfully generated README.md from README.html."

# Clean target to remove generated README.md
clean:
	@rm -f README.md
	@echo "Cleaned up generated README.md."

.PHONY: all clean
