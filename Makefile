dev-setup:
	@ansible-playbook --ask-become-pass playbooks/development-setup.yaml

lint:
	@yamllint --strict environments/ playbooks/ roles/
	@for p in $$( find playbooks/ -name *.yaml ); do \
	    ansible-lint $${p} || exit;                  \
	done && echo "Linting successful, all good to go!"

setup:
	vagrant up testbox

teardown:
	vagrant destroy testbox

clean:
	@make teardown
	@make setup

test: lint
	ansible-playbook -i environments/development/ playbooks/playbook.yaml

tryout:
	ansible-playbook -i environments/development/ playbooks/playbook.yaml --tags tryout
